<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\HomeLatestCollectionController;
use App\Http\Controllers\HomeBestSellerCollectionController;
use App\Http\Controllers\HomeCategoryCollectionController;
use App\Http\Controllers\FashionSchoolController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeAboutUsController;
use App\Http\Controllers\CourseDateRegController;
use App\Http\Controllers\RegistationController;
use App\Http\Controllers\FashionSchoolSliderController;
use App\Http\Controllers\FashionSchoolPackagesController;
use App\Http\Controllers\FashionSchoolGalleryController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $homecollection = DB::table('home_collections')->get();
    $homebestcollection = DB::table('home_best_collections')->get();
    $homecategorycollection = DB::table('home_category_collections')->get();
    // $homeaboutus = DB::table('home_about_us')->get();
    return view('home', compact('homecollection','homebestcollection','homecategorycollection'));

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// All Routes
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// middleware Auth Route
Route::group(['middleware' => 'auth'],function(){

    // User Management All Routes
Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class, 'UserView'])->name('users.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
    });

// User Profile and Change Management Routes
Route::prefix('profile')->group(function () {

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});

// Home Slider Management Routes
Route::prefix('slider')->group(function () {

    Route::get('/view', [HomeSliderController::class, 'HomeSlider'])->name('slider.view');
    Route::get('/add', [HomeSliderController::class, 'SliderAdd'])->name('slider.add');
    Route::post('/store', [HomeSliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [HomeSliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update/{id}', [HomeSliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [HomeSliderController::class, 'SliderDelete'])->name('slider.delete');

});

// Home Latest Collection Management Routes
Route::prefix('homecollection')->group(function () {

    Route::get('/view', [HomeLatestCollectionController::class, 'HomeCollection'])->name('homecollection.view');
    Route::get('/add', [HomeLatestCollectionController::class, 'HomeCollectionAdd'])->name('homecollection.add');
    Route::post('/store', [HomeLatestCollectionController::class, 'HomeCollectionStore'])->name('homecollection.store');
    Route::get('/edit/{id}', [HomeLatestCollectionController::class, 'HomeCollectionEdit'])->name('homecollection.edit');
    Route::post('/update/{id}', [HomeLatestCollectionController::class, 'HomeCollectionUpdate'])->name('homecollection.update');
    Route::get('/delete/{id}', [HomeLatestCollectionController::class, 'HomeCollectionDelete'])->name('homecollection.delete');

});

// Home Best Seller Collection Management Routes
Route::prefix('homesellercollection')->group(function () {

    Route::get('/view', [HomeBestSellerCollectionController::class, 'HomeBestCollection'])->name('homesellercollection.view');
    Route::get('/add', [HomeBestSellerCollectionController::class, 'HomeBestCollectionAdd'])->name('homesellercollection.add');
    Route::post('/store', [HomeBestSellerCollectionController::class, 'HomeBestCollectionStore'])->name('homesellercollection.store');
    Route::get('/edit/{id}', [HomeBestSellerCollectionController::class, 'HomeBestCollectionEdit'])->name('homesellercollection.edit');
    Route::post('/update/{id}', [HomeBestSellerCollectionController::class, 'HomeBestCollectionUpdate'])->name('homesellercollection.update');
    Route::get('/delete/{id}', [HomeBestSellerCollectionController::class, 'HomeBestCollectionDelete'])->name('homesellercollection.delete');

});

// Home Category Collection Management Routes
Route::prefix('homecategorycollection')->group(function () {

    Route::get('/view', [HomeCategoryCollectionController::class, 'HomeCategory'])->name('homecategorycollection.view');
    Route::get('/add', [HomeCategoryCollectionController::class, 'HomeCategoryAdd'])->name('homecategorycollection.add');
    Route::post('/store', [HomeCategoryCollectionController::class, 'HomeCategoryStore'])->name('homecategorycollection.store');
    Route::get('/edit/{id}', [HomeCategoryCollectionController::class, 'HomeCategoryEdit'])->name('homecategorycollection.edit');
    Route::post('/update/{id}', [HomeCategoryCollectionController::class, 'HomeCategoryUpdate'])->name('homecategorycollection.update');
    Route::get('/delete/{id}', [HomeCategoryCollectionController::class, 'HomeCategoryDelete'])->name('homecategorycollection.delete');

});

// Home About Us Management Routes
Route::prefix('homeaboutus')->group(function () {

    Route::get('/view', [HomeAboutUsController::class, 'HomeAboutUs'])->name('homeaboutus.view');
    Route::get('/add', [HomeAboutUsController::class, 'HomeAboutAdd'])->name('homeaboutus.add');
    Route::post('/store', [HomeAboutUsController::class, 'HomeAboutStore'])->name('homeaboutus.store');
    Route::get('/edit/{id}', [HomeAboutUsController::class, 'HomeAboutEdit'])->name('homeaboutus.edit');
    Route::post('/update/{id}', [HomeAboutUsController::class, 'HomeAboutUpdate'])->name('homeaboutus.update');
    Route::get('/delete/{id}', [HomeAboutUsController::class, 'HomeAboutDelete'])->name('homeaboutus.delete');

});



// Fashion School Management Routes
Route::prefix('fashionschool')->group(function () {

    Route::get('/view', [FashionSchoolController::class, 'FashionSchool'])->name('fashionschool.view');
    Route::get('/add', [HomeCategoryCollectionController::class, 'FashionSchoolAdd'])->name('fashionschool.add');
    Route::post('/store', [HomeCategoryCollectionController::class, 'FashionSchoolStore'])->name('fashionschool.store');
    Route::get('/edit/{id}', [HomeCategoryCollectionController::class, 'FashionSchoolEdit'])->name('fashionschool.edit');
    Route::post('/update/{id}', [HomeCategoryCollectionController::class, 'FashionSchoolUpdate'])->name('fashionschool.update');
    Route::get('/delete/{id}', [HomeCategoryCollectionController::class, 'FashionSchoolDelete'])->name('fashionschool.delete');

});

// Fashion School Slider Management Routes
Route::prefix('fashionschoolslider')->group(function () {

    Route::get('/view', [FashionSchoolSliderController::class, 'FashionSchoolSliderHome'])->name('fashionschoolslider.view');
    Route::get('/add', [FashionSchoolSliderController::class, 'FashionSchoolSliderAdd'])->name('fashionschoolslider.add');
    Route::post('/store', [FashionSchoolSliderController::class, 'FashionSchoolSliderStore'])->name('fashionschoolslider.store');
    Route::get('/edit/{id}', [FashionSchoolSliderController::class, 'FashionSchoolSliderEdit'])->name('fashionschoolslider.edit');
    Route::post('/update/{id}', [FashionSchoolSliderController::class, 'FashionSchoolSliderUpdate'])->name('fashionschoolslider.update');
    Route::get('/delete/{id}', [FashionSchoolSliderController::class, 'FashionSchoolSliderDelete'])->name('fashionschoolslider.delete');

});

// Fashion School Package Management Routes
Route::prefix('fashionschoolpackages')->group(function () {

    Route::get('/view', [FashionSchoolPackagesController::class, 'FashionSchoolPackagesHome'])->name('fashionschoolpackages.view');
    Route::get('/add', [FashionSchoolPackagesController::class, 'FashionSchoolPackagesAdd'])->name('fashionschoolpackages.add');
    Route::post('/store', [FashionSchoolPackagesController::class, 'FashionSchoolPackagesStore'])->name('fashionschoolpackages.store');
    Route::get('/edit/{id}', [FashionSchoolPackagesController::class, 'FashionSchoolPackagesEdit'])->name('fashionschoolpackages.edit');
    Route::post('/update/{id}', [FashionSchoolPackagesController::class, 'FashionSchoolPackagesUpdate'])->name('fashionschoolpackages.update');
    Route::get('/delete/{id}', [FashionSchoolPackagesController::class, 'FashionSchoolPackagesDelete'])->name('fashionschoolpackages.delete');

});

// Fashion School Gallery Management Routes
Route::prefix('fashionschoolgallery')->group(function () {

    Route::get('/view', [FashionSchoolGalleryController::class, 'FashionSchoolGalleryHome'])->name('fashionschoolgallery.view');
    Route::get('/add', [FashionSchoolGalleryController::class, 'FashionSchoolGalleryAdd'])->name('fashionschoolgallery.add');
    Route::post('/store', [FashionSchoolGalleryController::class, 'FashionSchoolGalleryStore'])->name('fashionschoolgallery.store');
    Route::get('/edit/{id}', [FashionSchoolGalleryController::class, 'FashionSchoolGalleryEdit'])->name('fashionschoolgallery.edit');
    Route::post('/update/{id}', [FashionSchoolGalleryController::class, 'FashionSchoolGalleryUpdate'])->name('fashionschoolgallery.update');
    Route::get('/delete/{id}', [FashionSchoolGalleryController::class, 'FashionSchoolGalleryDelete'])->name('fashionschoolgallery.delete');

});


// Collections Management Routes
Route::prefix('collection')->group(function () {

    Route::get('/view', [CollectionsController::class, 'CollectionHome'])->name('collection.view');
    Route::get('/add', [CollectionsController::class, 'CollectionsAdd'])->name('collection.add');
    Route::post('/store', [CollectionsController::class, 'CollectionsStore'])->name('collection.store');
    Route::get('/edit/{id}', [CollectionsController::class, 'CollectionsEdit'])->name('collection.edit');
    Route::post('/update/{id}', [CollectionsController::class, 'CollectionsUpdate'])->name('collection.update');
    Route::post('/image/update', [CollectionsController::class, 'CollectionsUpdateMultimage'])->name('collection.update.image'); // Another way without using {id}
    Route::post('/imagethumbnail/update', [CollectionsController::class, 'CollectionsUpdateThumbnail'])->name('collection.update.imagethumbnail');
    Route::get('/multimage/delete/{id}', [CollectionsController::class, 'CollectionsMultimageDelete'])->name('collection.multiimg.delete');
    Route::get('/delete/{id}', [CollectionsController::class, 'CollectionsDelete'])->name('collection.delete');
});

// About Management Routes
Route::prefix('about')->group(function () {

    Route::get('/view', [AboutController::class, 'AboutHome'])->name('about.view');
    Route::get('/add', [AboutController::class, 'AboutAdd'])->name('about.add');
    Route::post('/store', [AboutController::class, 'AboutStore'])->name('about.store');
    Route::get('/edit/{id}', [AboutController::class, 'AboutEdit'])->name('about.edit');
    Route::post('/update/{id}', [AboutController::class, 'AboutUpdate'])->name('about.update');
    Route::get('/delete/{id}', [AboutController::class, 'AboutDelete'])->name('about.delete');

});

// Contact Management Routes
Route::prefix('contact')->group(function () {

    Route::get('/view', [ContactController::class, 'ContactHome'])->name('contact.view');
    Route::get('/add', [ContactController::class, 'ContactAdd'])->name('contact.add');
    Route::post('/store', [ContactController::class, 'ContactStore'])->name('contact.store');
    Route::get('/edits/{id}', [ContactController::class, 'ContactEdit'])->name('contact.edit');
    Route::post('/update/{id}', [ContactController::class, 'ContactUpdate'])->name('contact.update');
    Route::get('/deletes/{id}', [ContactController::class, 'ContactDelete'])->name('contact.delete');

    // Contact Message (part) Management Routes
    Route::get('/message', [ContactController::class, 'MessageContactIndex'])->name('contactmessage.view');
    Route::get('/edit/{id}', [ContactController::class, 'ContactMessageRead'])->name('contactmessage.read');
    Route::get('/delete/{id}', [ContactController::class, 'ContactMessageDelete'])->name('contactmessage.delete');


});

// Registration(Add Course&date) Management Routes
Route::prefix('coursedate')->group(function () {

    Route::get('/view', [CourseDateRegController::class, 'CourseDateHome'])->name('coursedate.view');
    Route::get('/add', [CourseDateRegController::class, 'CourseDateAdd'])->name('coursedate.add');
    Route::post('/store', [CourseDateRegController::class, 'CourseDateStore'])->name('coursedate.store');
    Route::get('/edit/{id}', [CourseDateRegController::class, 'CourseDateEdit'])->name('coursedate.edit');
    Route::post('/update/{id}', [CourseDateRegController::class, 'CourseDateUpdate'])->name('coursedate.update');
    Route::get('/delete/{id}', [CourseDateRegController::class, 'CourseDateDelete'])->name('coursedate.delete');

});

// Registration(Add Course&date) Management Routes
Route::prefix('registation')->group(function () {

    Route::get('/view', [RegistationController::class, 'RegistationHome'])->name('applicant.view');
    Route::get('/edit/{id}', [RegistationController::class, 'RegistationEdit'])->name('registation.edit');
    Route::get('/delete/{id}', [RegistationController::class, 'RegistationDelete'])->name('registation.delete');

});




});

// Fashion School Pages Management Routes
Route::get('/Fashionschool', [FashionSchoolController::class, 'FashionSchoolPage']);
// Collections Pages Management Routes
Route::get('/Collections', [CollectionsController::class, 'CollectionPage']);
// Collection Details Pages Management Routes
Route::get('/collections/details/{id}', [CollectionsController::class, 'CollectionDetails']);
// About Pages Management Routes
Route::get('/About', [AboutController::class, 'AboutPage']);
// Contact Pages Management Routes
Route::get('/Contact-Us', [ContactController::class, 'ContactPage']);
Route::post('/Contactform', [ContactController::class, 'ContactForm'])->name('contact.form');
// Registration(Add Course&date) Management Routes
Route::get('/Registration', [CourseDateRegController::class, 'RegistrationPage'])->name('registration.page');
Route::post('/RegistrationForm', [CourseDateRegController::class, 'RegistrationForm'])->name('registration.form');
// // Fashion Slider Pages Management Routes
// Route::get('/About', [FashionSchoolSliderController::class, 'HomeSliderPage']);
