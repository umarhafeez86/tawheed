<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Frontend\MainFormsController;

use App\Http\Controllers\Frontend\FavoriteController;

use App\Http\Controllers\Frontend\CompareController;

use App\Http\Controllers\Frontend\MainUsersController;

use App\Http\Controllers\Frontend\MainServicesController;

use App\Http\Controllers\Frontend\MainStaticpagesController;

use App\Http\Controllers\Frontend\MainServicepacakgesController;

use App\Http\Controllers\Frontend\MainBlogsController;

use App\Http\Controllers\Frontend\MainemailtemplatesController;

use App\Http\Controllers\Frontend\MainDestinationsController;

use App\Http\Controllers\Administrative\AdminController;

use App\Http\Controllers\Administrative\UsergroupsController;

use App\Http\Controllers\Administrative\WladminsController;

use App\Http\Controllers\Administrative\SettingsController;

use App\Http\Controllers\Administrative\FaqsController;

use App\Http\Controllers\Administrative\ServicesController;

use App\Http\Controllers\Administrative\ServicepackagesController;

use App\Http\Controllers\Administrative\ServicesdetailsController;

use App\Http\Controllers\Administrative\HotelimgsController;

use App\Http\Controllers\Administrative\HotelinfosController;

use App\Http\Controllers\Administrative\StaticpagesController;

use App\Http\Controllers\Administrative\TestimonialsController;

use App\Http\Controllers\Administrative\BannersController;

use App\Http\Controllers\Administrative\SlidersController;

use App\Http\Controllers\Administrative\PartnersController;

use App\Http\Controllers\Administrative\PackagesController;

use App\Http\Controllers\Administrative\BlogsController;

use App\Http\Controllers\Administrative\EmailtemplatesController;

use App\Http\Controllers\Administrative\DestinationsController;

use App\Http\Controllers\Administrative\HotelslogosController;

use App\Http\Controllers\Administrative\AirlineslogosController;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Auth;

use App\Models\Wlleftmenu;

Route::get('/',[HomeController::class,'index']);
Route::post('book-inquiry',[HomeController::class,'bookinquiry']);
Route::post('book-inquiry-submit',[HomeController::class,'bookinquirysubmit']);

Route::get('beat-my-price',[HomeController::class,'beatmyprice']);
Route::get('hajj-packages',[HomeController::class,'hajjpackages']);
Route::post('/homefilterdata', [HomeController::class,'homefilterdata']);
Route::get('/reviews',[HomeController::class,'reviews']);
Route::get('/load-more-reviews', [HomeController::class, 'loadMorereviews']);

Route::get('/information/{pages_url}',[MainStaticpagesController::class,'pagesdetails']);

Route::post('/booknow-package',[MainFormsController::class,'booknowpackage']);
Route::post('/submitcustomform',[MainFormsController::class,'submitcustomform']);

Route::post('/fast-quote-process', [MainFormsController::class,'fastquoteprocess']);
Route::post('/estimateformprocess', [MainFormsController::class,'estimateformprocess']);
Route::post('/beat-my-price-process', [MainFormsController::class,'beatmypriceprocess']);
Route::post('/register-for-hajj-packages', [MainFormsController::class,'registerforhajjpackages']);
Route::post('/contact-submit', [MainFormsController::class,'contactsubmit']);

Route::get('/statesbycountry/{country_id}',[MainUsersController::class,'statesbycountry']);

Route::get('/signup-patients',[MainUsersController::class,'signuppatients']);

Route::get('/signup-doctors',[MainUsersController::class,'signupdoctors']);
Route::post('/signup-doctors-process', [MainUsersController::class,'signupdoctorsprocess']);

Route::get('/login',[MainUsersController::class,'login']);
Route::post('/loginprocess',[MainUsersController::class,'loginprocess']);


Route::get('/services',[MainServicesController::class,'index']);
Route::get('/skilsbyservices/{services_id}',[MainServicesController::class,'skilsbyservices']);

//Route::get('/umrah-packages', [MainServicesController::class,'servicesinfo'])->name('services.servicesdetails');

Route::get('/umrah-packages', [MainServicesController::class,'servicesdetails'])->name('services.servicesdetails');

Route::get('/services/{service_url}', [MainServicesController::class,'servicesdetails'])->name('services.servicesdetails');
Route::post('/services/{service_url}', [MainServicesController::class,'servicesdetails'])->name('services.servicesdetails');
Route::post('/services/{service_url}/filterdata', [MainServicesController::class, 'filterdata'])->name('services.filterdata');
//Route::get('/load-more-packages', [MainServicesController::class, 'loadMore']);

Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
Route::post('/compares/toggle', [CompareController::class, 'toggle'])->name('compares.toggle');

Route::get('/package/{servicepackages_url}', [MainServicepacakgesController::class,'packagedetails'])->name('packages.packagedetails');

Route::get('/compare-packages', [MainServicesController::class,'packagescompare'])->name('services.packagescompare');
Route::get('/saved-packages', [MainServicesController::class,'packagesfavorites'])->name('services.favorites');

Route::get('/blog',[MainBlogsController::class,'index']);
Route::get('/load-more-blogs', [MainBlogsController::class, 'loadMore']);
Route::get('/blog/{blog_url}', [MainBlogsController::class,'blogsdetails'])->name('blogs.blogsdetails');

//Route::get('/administrative', [AdminController::class,'index']);
Route::get('/administrative', [AdminController::class,'index'])->name('administrative.login');
Route::post('/administrative', [AdminController::class,'logincheck'])->name('administrative.logincheck');
Route::get('/administrative/dashboard', [AdminController::class,'dashboard'])->name('administrative.dashboard');
Route::get('/administrative/logout', [AdminController::class,'logout']);

Route::controller(UsergroupsController::class)->group(function(){
            Route::get('/administrative/usergroups/index','index')->name('administrative.usergroups.index');
            Route::get('/administrative/usergroups/create','create')->name('administrative.usergroups.create');
            Route::post('/administrative/usergroups','store')->name('administrative.usergroups.store');
            Route::get('/administrative/usergroups/edit/{usergroups}','edit')->name('administrative.usergroups.edit');
            Route::put('/administrative/usergroups/{usergroups}','update')->name('administrative.usergroups.update');
            Route::delete('/administrative/usergroups/{usergroups}','destroy')->name('administrative.usergroups.destroy');
});

Route::controller(WladminsController::class)->group(function(){
    Route::get('/administrative/usersadmin/index','index')->name('administrative.usersadmin.index');
    Route::get('/administrative/usersadmin/create','create')->name('administrative.usersadmin.create');
    Route::post('/administrative/usersadmin','store')->name('administrative.usersadmin.store');
    Route::get('/administrative/usersadmin/edit/{useradmin}','edit')->name('administrative.usersadmin.edit');
    Route::put('/administrative/usersadmin/{useradmin}','update')->name('administrative.usersadmin.update');
    Route::delete('/administrative/usersadmin/{useradmin}','destroy')->name('administrative.usersadmin.destroy');
});

Route::controller(SettingsController::class)->group(function(){
    Route::get('/administrative/settings/index','index')->name('administrative.settings.index');
    Route::get('/administrative/settings/create','create')->name('administrative.settings.create');
    Route::post('/administrative/settings','store')->name('administrative.settings.store');
    Route::get('/administrative/settings/edit/{setting}','edit')->name('administrative.settings.edit');
    Route::put('/administrative/settings/{setting}','update')->name('administrative.settings.update');
    Route::delete('/administrative/settings/{setting}','destroy')->name('administrative.settings.destroy');
});

Route::controller(FaqsController::class)->group(function(){
    Route::get('/administrative/faqs/index','index')->name('administrative.faqs.index');
    Route::get('/administrative/faqs/create','create')->name('administrative.faqs.create');
    Route::post('/administrative/faqs','store')->name('administrative.faqs.store');
    Route::get('/administrative/faqs/edit/{faq}','edit')->name('administrative.faqs.edit');
    Route::put('/administrative/faqs/{faq}','update')->name('administrative.faqs.update');
    Route::delete('/administrative/faqs/{faq}','destroy')->name('administrative.faqs.destroy');
    Route::get('/administrative/faqs/addnewrow/{newrow}','addnewrow')->name('administrative.faqs.addnewrow');
});


Route::controller(ServicesController::class)->group(function(){
    Route::get('/administrative/services/index','index')->name('administrative.services.index');
    Route::get('/administrative/services/create','create')->name('administrative.services.create');
    Route::post('/administrative/services','store')->name('administrative.services.store');
    Route::get('/administrative/services/edit/{service}','edit')->name('administrative.services.edit');
    Route::put('/administrative/services/{service}','update')->name('administrative.services.update');
    Route::delete('/administrative/services/{service}','destroy')->name('administrative.services.destroy');
    Route::get('/administrative/services/addnewrow/{newrow}','addnewrow')->name('administrative.services.addnewrow');

    Route::get('/administrative/services/change_related/{service}','change_related')->name('administrative.services.change_related');

});

Route::controller(ServicesdetailsController::class)->group(function(){
    Route::get('/administrative/servicesdetails/index/{service}','index')->name('administrative.servicesdetails.index');
    Route::get('/administrative/servicesdetails/create/{service}','create')->name('administrative.servicesdetails.create');
    Route::post('/administrative/servicesdetails','store')->name('administrative.servicesdetails.store');
    Route::get('/administrative/servicesdetails/edit/{servicesdetail}','edit')->name('administrative.servicesdetails.edit');
    Route::put('/administrative/servicesdetails/{servicesdetail}','update')->name('administrative.servicesdetails.update');
    Route::delete('/administrative/servicesdetails/{servicesdetail}','destroy')->name('administrative.servicesdetails.destroy');
});

Route::controller(ServicepackagesController::class)->group(function(){
    Route::get('/administrative/servicepackages/index','index')->name('administrative.servicepackages.index');
    Route::get('/administrative/servicepackages/create','create')->name('administrative.servicepackages.create');
    Route::post('/administrative/servicepackages','store')->name('administrative.servicepackages.store');
    Route::get('/administrative/servicepackages/edit/{service}','edit')->name('administrative.servicepackages.edit');
    Route::put('/administrative/servicepackages/{service}','update')->name('administrative.servicepackages.update');
    Route::delete('/administrative/servicepackages/{service}','destroy')->name('administrative.servicepackages.destroy');
    Route::get('/administrative/servicepackages/addnewrow/{newrow}','addnewrow')->name('administrative.servicepackages.addnewrow');
    Route::get('/administrative/servicepackages/change_stock/{service}','change_stock')->name('administrative.servicepackages.change_stock');
    Route::get('/administrative/servicepackages/change_showall/{service}','change_showall')->name('administrative.servicepackages.change_showall');
    Route::get('/administrative/servicepackages/change_featured/{service}','change_featured')->name('administrative.servicepackages.change_featured');


    Route::get('/administrative/servicepackages/imagesgallery/{service}','imagesgallery')->name('administrative.servicepackages.imagesgallery');
    Route::get('/administrative/servicepackagesgallery/createimagesgallery/{service}','createimagesgallery')->name('administrative.servicepackagesgallery.createimagesgallery');
    Route::post('/administrative/servicepackagesgallery','storeimagesgallery')->name('administrative.servicepackagesgallery.storeimagesgallery');
    Route::get('/administrative/servicepackagesgallery/editimagesgallery/{service}','editimagesgallery')->name('administrative.servicepackages.editimagesgallery');
    Route::put('/administrative/servicepackagesgallery/{service}','updateimagesgallery')->name('administrative.servicepackagesgallery.updateimagesgallery');
    Route::delete('/administrative/servicepackagesgallery/{service}','destroyimagesgallery')->name('administrative.servicepackagesgallery.destroyimagesgallery');

});


Route::controller(HotelinfosController::class)->group(function(){
    Route::get('/administrative/hotelinfos/index','index')->name('administrative.hotelinfos.index');
    Route::get('/administrative/hotelinfos/create','create')->name('administrative.hotelinfos.create');
    Route::post('/administrative/hotelinfos','store')->name('administrative.hotelinfos.store');
    Route::get('/administrative/hotelinfos/edit/{hotelinfo}','edit')->name('administrative.hotelinfos.edit');
    Route::put('/administrative/hotelinfos/{hotelinfo}','update')->name('administrative.hotelinfos.update');
    Route::delete('/administrative/hotelinfos/{hotelinfo}','destroy')->name('administrative.hotelinfos.destroy');

    Route::get('/administrative/hotelinfos/imagesgallery/{hotel}','imagesgallery')->name('administrative.hotelinfos.imagesgallery');
    Route::get('/administrative/hotelinfosgallery/createimagesgallery/{hotel}','createimagesgallery')->name('administrative.hotelinfosgallery.createimagesgallery');
    Route::post('/administrative/hotelinfosgallery','storeimagesgallery')->name('administrative.hotelinfosgallery.storeimagesgallery');
    Route::get('/administrative/hotelinfosgallery/editimagesgallery/{hotel}','editimagesgallery')->name('administrative.hotelinfos.editimagesgallery');
    Route::put('/administrative/hotelinfosgallery/{hotel}','updateimagesgallery')->name('administrative.hotelinfosgallery.updateimagesgallery');
    Route::delete('/administrative/hotelinfosgallery/{hotel}','destroyimagesgallery')->name('administrative.hotelinfosgallery.destroyimagesgallery');


});

Route::controller(StaticpagesController::class)->group(function(){
    Route::get('/administrative/staticpages/index','index')->name('administrative.staticpages.index');
    Route::get('/administrative/staticpages/create','create')->name('administrative.staticpages.create');
    Route::post('/administrative/staticpages','store')->name('administrative.staticpages.store');
    Route::get('/administrative/staticpages/edit/{staticpage}','edit')->name('administrative.staticpages.edit');
    Route::put('/administrative/staticpages/{staticpage}','update')->name('administrative.staticpages.update');
    Route::delete('/administrative/staticpages/{staticpage}','destroy')->name('administrative.staticpages.destroy');
});

Route::controller(TestimonialsController::class)->group(function(){
    Route::get('/administrative/testimonials/index','index')->name('administrative.testimonials.index');
    Route::get('/administrative/testimonials/create','create')->name('administrative.testimonials.create');
    Route::post('/administrative/testimonials','store')->name('administrative.testimonials.store');
    Route::get('/administrative/testimonials/edit/{staticpage}','edit')->name('administrative.testimonials.edit');
    Route::put('/administrative/testimonials/{staticpage}','update')->name('administrative.testimonials.update');
    Route::delete('/administrative/testimonials/{staticpage}','destroy')->name('administrative.testimonials.destroy');
});

Route::controller(BannersController::class)->group(function(){
    Route::get('/administrative/banners/index','index')->name('administrative.banners.index');
    Route::get('/administrative/banners/create','create')->name('administrative.banners.create');
    Route::post('/administrative/banners','store')->name('administrative.banners.store');
    Route::get('/administrative/banners/edit/{banner}','edit')->name('administrative.banners.edit');
    Route::put('/administrative/banners/{banner}','update')->name('administrative.banners.update');
    Route::delete('/administrative/banners/{banner}','destroy')->name('administrative.banners.destroy');
});

Route::controller(SlidersController::class)->group(function(){
    Route::get('/administrative/sliders/index','index')->name('administrative.sliders.index');
    Route::get('/administrative/sliders/create','create')->name('administrative.sliders.create');
    Route::post('/administrative/sliders','store')->name('administrative.sliders.store');
    Route::get('/administrative/sliders/edit/{banner}','edit')->name('administrative.sliders.edit');
    Route::put('/administrative/sliders/{banner}','update')->name('administrative.sliders.update');
    Route::delete('/administrative/sliders/{banner}','destroy')->name('administrative.sliders.destroy');
});

Route::controller(PartnersController::class)->group(function(){
    Route::get('/administrative/partners/index','index')->name('administrative.partners.index');
    Route::get('/administrative/partners/create','create')->name('administrative.partners.create');
    Route::post('/administrative/partners','store')->name('administrative.partners.store');
    Route::get('/administrative/partners/edit/{partner}','edit')->name('administrative.partners.edit');
    Route::put('/administrative/partners/{partner}','update')->name('administrative.partners.update');
    Route::delete('/administrative/partners/{partner}','destroy')->name('administrative.partners.destroy');
});

Route::controller(PackagesController::class)->group(function(){
    Route::get('/administrative/packages/index','index')->name('administrative.packages.index');
    Route::get('/administrative/packages/create','create')->name('administrative.packages.create');
    Route::post('/administrative/packages','store')->name('administrative.packages.store');
    Route::get('/administrative/packages/edit/{package}','edit')->name('administrative.packages.edit');
    Route::put('/administrative/packages/{package}','update')->name('administrative.packages.update');
    Route::delete('/administrative/packages/{package}','destroy')->name('administrative.packages.destroy');
});

Route::controller(BlogsController::class)->group(function(){
    Route::get('/administrative/blogs/index','index')->name('administrative.blogs.index');
    Route::get('/administrative/blogs/create','create')->name('administrative.blogs.create');
    Route::post('/administrative/blogs','store')->name('administrative.blogs.store');
    Route::get('/administrative/blogs/edit/{blog}','edit')->name('administrative.blogs.edit');
    Route::put('/administrative/blogs/{blog}','update')->name('administrative.blogs.update');
    Route::delete('/administrative/blogs/{blog}','destroy')->name('administrative.blogs.destroy');
});


Route::controller(EmailtemplatesController::class)->group(function(){
    Route::get('/administrative/emailtemplates/index','index')->name('administrative.emailtemplates.index');
    Route::get('/administrative/emailtemplates/create','create')->name('administrative.emailtemplates.create');
    Route::post('/administrative/emailtemplates','store')->name('administrative.emailtemplates.store');
    Route::get('/administrative/emailtemplates/edit/{emailtemplate}','edit')->name('administrative.emailtemplates.edit');
    Route::put('/administrative/emailtemplates/{emailtemplate}','update')->name('administrative.emailtemplates.update');
    Route::delete('/administrative/emailtemplates/{emailtemplate}','destroy')->name('administrative.emailtemplates.destroy');
});

Route::controller(DestinationsController::class)->group(function(){
    Route::get('/administrative/destinations/index','index')->name('administrative.destinations.index');
    Route::get('/administrative/destinations/create','create')->name('administrative.destinations.create');
    Route::post('/administrative/destinations','store')->name('administrative.destinations.store');
    Route::get('/administrative/destinations/edit/{destination}','edit')->name('administrative.destinations.edit');
    Route::put('/administrative/destinations/{destination}','update')->name('administrative.destinations.update');
    Route::delete('/administrative/destinations/{destination}','destroy')->name('administrative.destinations.destroy');
});

Route::controller(HotelslogosController::class)->group(function(){
    Route::get('/administrative/hotelslogos/index','index')->name('administrative.hotelslogos.index');
    Route::get('/administrative/hotelslogos/create','create')->name('administrative.hotelslogos.create');
    Route::post('/administrative/hotelslogos','store')->name('administrative.hotelslogos.store');
    Route::get('/administrative/hotelslogos/edit/{hotelslogo}','edit')->name('administrative.hotelslogos.edit');
    Route::put('/administrative/hotelslogos/{hotelslogo}','update')->name('administrative.hotelslogos.update');
    Route::delete('/administrative/hotelslogos/{hotelslogo}','destroy')->name('administrative.hotelslogos.destroy');
});

Route::controller(AirlineslogosController::class)->group(function(){
    Route::get('/administrative/airlineslogos/index','index')->name('administrative.airlineslogos.index');
    Route::get('/administrative/airlineslogos/create','create')->name('administrative.airlineslogos.create');
    Route::post('/administrative/airlineslogos','store')->name('administrative.airlineslogos.store');
    Route::get('/administrative/airlineslogos/edit/{airlineslogo}','edit')->name('administrative.airlineslogos.edit');
    Route::put('/administrative/airlineslogos/{airlineslogo}','update')->name('administrative.airlineslogos.update');
    Route::delete('/administrative/airlineslogos/{airlineslogo}','destroy')->name('administrative.airlineslogos.destroy');
});

Route::get('/load-more-packages', [MainServicesController::class, 'loadMore']);

Route::get('/{servicepackages_url}', [MainServicesController::class,'servicesdetailsnew'])->name('services.servicesdetails');
Route::post('/{servicepackages_url}/filterdata', [MainServicesController::class,'filterdatanew'])->name('services.filterdata');

Route::get('/cache',function(){
    Artisan::call('cache:clear');
});
