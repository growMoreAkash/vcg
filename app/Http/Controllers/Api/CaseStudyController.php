<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class CaseStudyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET ALL (Public)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $caseStudies = CaseStudy::where('status', true)
            ->latest()
            ->get();

        if ($caseStudies->isEmpty()) {
            return response()->json([
                'message' => 'No Case Studies Found'
            ], 404);
        }

        return response()->json([
            'data' => $caseStudies
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | GET SINGLE BY SLUG (Public)
    |--------------------------------------------------------------------------
    */
    public function show($slug)
    {
        $caseStudies = CaseStudy::where('status', true)
            ->where(function ($query) use ($slug) {
                $query->where('slug', 'LIKE', "%{$slug}%")
                    ->orWhere('title', 'LIKE', "%{$slug}%")
                    ->orWhere('outer_text', 'LIKE', "%{$slug}%");
            })
            ->latest()
            ->get();

        if ($caseStudies->isEmpty()) {
            return response()->json([
                'message' => 'No Matching Case Studies Found'
            ], 404);
        }

        return response()->json([
            'data' => $caseStudies
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE (Admin Only)
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'postImage' => 'required|image|mimetypes:image/jpeg,image/png|max:2048',
            'outerText' => 'required|string|max:255',
            'innerText' => 'required|string',
            'pdfFile' => 'required|mimes:pdf|max:5000',
            'highLights' => 'nullable|array',
            'status' => 'nullable|boolean'
        ]);

        $imagePath = $request->file('postImage')
            ->store('case-studies/images', 'public');

        $pdfPath = $request->file('pdfFile')
            ->store('case-studies/pdfs', 'public');

        $slug = Str::slug($request->outerText);

        // Ensure unique slug
        $count = CaseStudy::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $caseStudy = CaseStudy::create([
            'slug' => $slug,
            'post_image' => $imagePath,
            'outer_text' => $request->outerText,
            'inner_text' => $request->innerText,
            'pdf_file' => $pdfPath,
            'high_lights' => $request->highLights,
            'status' => $request->status ?? true,
        ]);

        return response()->json([
            'message' => 'Case Study Created Successfully',
            'data' => $caseStudy
        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE (Admin Only)
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $caseStudy = CaseStudy::find($id);

        if (!$caseStudy) {
            return response()->json([
                'message' => 'Case Study Not Found'
            ], 404);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'postImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'outerText' => 'nullable|string|max:255',
            'innerText' => 'nullable|string',
            'pdfFile' => 'nullable|mimes:pdf|max:5000',
            'highLights' => 'nullable|array',
            'status' => 'nullable|boolean'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Title + Regenerate Slug (If Title Changes)
        |--------------------------------------------------------------------------
        */
        if ($request->has('title')) {

            $originalSlug = Str::slug($request->title);
            $slug = $originalSlug;
            $counter = 1;

            while (
                CaseStudy::where('slug', $slug)
                    ->where('id', '!=', $caseStudy->id)
                    ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $caseStudy->title = $request->title;
            $caseStudy->slug = $slug;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('postImage')) {
            Storage::disk('public')->delete($caseStudy->post_image);

            $caseStudy->post_image = $request->file('postImage')
                ->store('case-studies/images', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update PDF
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('pdfFile')) {
            Storage::disk('public')->delete($caseStudy->pdf_file);

            $caseStudy->pdf_file = $request->file('pdfFile')
                ->store('case-studies/pdfs', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update Other Fields
        |--------------------------------------------------------------------------
        */
        if ($request->has('outerText')) {
            $caseStudy->outer_text = $request->outerText;
        }

        if ($request->has('innerText')) {
            $caseStudy->inner_text = $request->innerText;
        }

        if ($request->has('highLights')) {
            $caseStudy->high_lights = $request->highLights;
        }

        if ($request->has('status')) {
            $caseStudy->status = $request->status;
        }

        $caseStudy->save();

        return response()->json([
            'message' => 'Case Study Updated Successfully',
            'data' => $caseStudy
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE (Admin Only - Soft Delete)
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $caseStudy = CaseStudy::find($id);

        if (!$caseStudy) {
            return response()->json([
                'message' => 'Case Study Not Found'
            ], 404);
        }

        // Instead of deleting, just update status
        $caseStudy->status = false;
        $caseStudy->save();

        return response()->json([
            'message' => 'Case Study Disabled Successfully',
            'data' => $caseStudy
        ]);
    }

    public function restore($id)
    {
        $caseStudy = CaseStudy::find($id);

        if (!$caseStudy) {
            return response()->json([
                'message' => 'Case Study Not Found'
            ], 404);
        }

        $caseStudy->status = true;
        $caseStudy->save();

        return response()->json([
            'message' => 'Case Study Restored Successfully',
            'data' => $caseStudy
        ]);
    }
}
