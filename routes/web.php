<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
Route::view('/', 'home');
Route::view('/services', 'services');
Route::view('/contact', 'contact');

Route::view('/services/strategy', 'services.strategy');
Route::view('/services/m&a', 'services.m&a');
Route::view('/services/m&a', 'services.m&a');
Route::view('/services/strategy/corporate-business-unit-strategy', 'services.pages.corporate');
Route::view('/services/strategy/market-entry-strategy', 'services.pages.market');
Route::view('/services/strategy/strategic-wargaming', 'services.pages.strategic');
Route::view('/services/strategy/competitive-benchmarking-analytics', 'services.pages.competitive');
Route::view('/services/strategy/customer-channel-strategy', 'services.pages.customer');


Route::view('/services/ma/portfolio-strategy', 'services.pagesM.portfolio');
Route::view('/services/ma/ma-strategy', 'services.pagesM.ma');
Route::view('/services/ma/target-screening', 'services.pagesM.target');
Route::view('/services/ma/commercial-due-diligence', 'services.pagesM.commercial');
Route::view('/services/ma/shareholder-value-management', 'services.pagesM.shareholder');
Route::view('/services/ma/portfolio-strategy', 'services.pagesM.portfolio');

Route::view('/services/geographiccoverage', 'geographiccoverage');
Route::view('/services/coverage', 'coverage');
Route::view('/case-studies', 'case');
// Route::view('/', '');
// Route::view('/', '');
// Route::view('/', '');
// Route::view('/', '');
// Route::view('/', '');
// Route::view('/', '');
// Route::view('/', '');
