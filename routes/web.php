<?php

use Illuminate\Support\Facades\Route;

//Website Links
//Route::get('/', 'WebsiteController@indexPage');
Route::get('/', 'WebsiteController@indexPage')->name('site.index');
Route::get('/home', 'WebsiteController@homePage')->name('site.home');
Route::get('/portfolio', 'WebsiteController@portfolioPage')->name('site.portfolio');
Route::get('/portfolio/{project_id}/{project_name}/details', 'WebsiteController@portfolioDetailsPage')->name('site.portfolio.details');
Route::get('/whats_on_media', 'WebsiteController@whatsOnMedia')->name('site.whats.on.media');
Route::get('/whats_on_media_details/{id}', 'WebsiteController@whatsOnMediaDetails')->name('site.whats.on.media.details');
Route::get('/press_release', 'WebsiteController@pressRelease')->name('site.press.release');
Route::get('/press_release_details/{id}', 'WebsiteController@pressReleaseDetails')->name('site.press.release.details');

Route::get('/whats_new', 'WebsiteController@whatsNew')->name('site.whats.new');
Route::get('/whats_new_details/{id}', 'WebsiteController@whatsNewDetails')->name('site.whats.new.details');

Route::get('/press_kit', 'WebsiteController@pressKit')->name('site.press.kit');
Route::get('/press_kit_details/{id}', 'WebsiteController@pressKitDetails')->name('site.press.kit.details');

Route::get('/csr', 'WebsiteController@csr')->name('site.csr');
Route::get('/csr_details/{id}', 'WebsiteController@csrDetails')->name('site.csr.details');

Route::get('/sponsorships', 'WebsiteController@sponsorships')->name('site.sponsorships');
Route::get('/sponsorships_details/{id}', 'WebsiteController@sponsorshipsDetails')->name('site.sponsorships.details');
Route::get('/leadership', 'WebsiteController@leadership')->name('site.leadership');
Route::get('/about_company', 'WebsiteController@aboutCompany')->name('site.about.company');
Route::get('/philosophy', 'WebsiteController@philosophy')->name('site.philosophy');
Route::get('/contact_us', 'WebsiteController@contactUs')->name('site.contact.us');
Route::post('/csr/load_data', 'WebsiteController@csrLoadMoreData')->name('csr.load.more.data');
Route::get('/csr_details/{id}/detail', 'WebsiteController@csrdetails')->name('site.csr.details');

Route::get('/terms_and_conditions', 'WebsiteController@TermsAndConductions')->name('site.terms.and.conditions');
Route::get('/privacy_policy', 'WebsiteController@PrivacyPolicy')->name('site.privacy.policy');

Route::post('save-subscribe-newsletters','WebsiteController@saveSubscribeNewsLetters')->name('save.subscribe.news.letters');
Route::get('subscribe-newsletters/verify','WebsiteController@verifySubscribeNewsLetters')->name('verify.subscribe.news.letters');
Route::post('save-inquireform-details','WebsiteController@saveContactdetails')->name('save.contact.inquire.details');
Route::get('download/{floorplan_id}/floorplan/files','WebsiteController@floorPlanFilesDownload')->name('download.floorplan.files');
Route::get('download/{brochure_id}/brochure/files','WebsiteController@brochureFilesDownload')->name('download.brochure.files');


route::post('/sponsorship/load_data','WebsiteController@sponsorshiploadmoredata')->name('sponsorship.load.more.data');
route::post('/whats_on_media/load_data','WebsiteController@whatsonmedialoadmore')->name('whats_on_media.load.more.data');
route::post('/pressrelease/load_data','WebsiteController@pressreleaseloadmore')->name('press.release.load.more.data');
route::post('/whatsnew/load_data','WebsiteController@whatsnewloadmoredata')->name('whatsnew.load.more.data');
//csr.loadMore.load_data

//CMS Links
Route::get('/login', 'AuthController@loginPage')->name('login');
Route::get('/register', 'AuthController@registerPage')->name('register');
Route::post('/loginAccess', 'AuthController@postLogin')->name('loginAccess');
Route::post('/registerAccount', 'AuthController@postRegistration')->name('registerAccount');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix'=>'cms'],function () {
        Route::get('dashboard', 'AuthController@dashboardPage')->name('dashboard');

        Route::get('categories', 'CategoriesController@categories')->name('categories');
        Route::post('categories/saveCategory', 'CategoriesController@saveCategory')->name('categories.save');
        Route::get('categories/{category_id}/editData', 'CategoriesController@editCategories')->name('edit.category');
        Route::post('categories/updateCategory', 'CategoriesController@updateCategory')->name('categories.update');
        Route::get('categories/{category_id}/deleteCategory', 'CategoriesController@deleteCategory')->name('categories.delete');



        Route::get('/portfolioAdd', 'PortfolioController@portfolioAdd')->name('portfolio.add');
        //tabs
        Route::get('/portfolio/designTabs/{tabType}', 'PortfolioController@portfolioTabType');
        
        Route::post('/portfolio/savePortfolio', 'PortfolioController@portFoliosDataSave')->name('portfolio.save');
        //Route::post('/portfolio/savePortfolio', 'PortfolioController@savePortfolio')->name('portfolio.save');
        Route::post('/portfolio/updatePortfolio', 'PortfolioController@updatePortfolio')->name('portfolio.update');
        Route::get('/portfolioList', 'PortfolioController@portfolioList')->name('portfolio.list');
        Route::get('portfolio/{portfolio_id}/editPortfolio', 'PortfolioController@editPortfolio')->name('portfolio.edit');
        Route::get('portfolio/{portfolio_id}/deletePortfolio', 'PortfolioController@deletePortfolio')->name('portfolio.delete');
        Route::post('portfolio/deleteImages','PortfolioController@deleteImagesPortfolio')->name('portfolio.images.delete');



        Route::get('/addFeatureProject','projectsController@addFeatureProject')->name('addFeatureProject');
        Route::post('/saveFeatureProject','projectsController@saveFeatureProject')->name('feature.projects.save');
        Route::post('/updateFeatureProject','projectsController@updateFeatureProject')->name('feature.projects.update');
        Route::get('/featureProjectList','projectsController@featureProjectList')->name('featureProjectList');
        Route::get('/featureProject/{featureProject_id}/editFeatureProject','projectsController@editFeatureProject')->name('editFeatureProject');
        Route::get('/featureProject/{featureProject_id}/deleteFeatureProject','projectsController@deleteFeatureProject')->name('deleteFeatureProject');



        Route::get('amenities','MasterDataController@amenitiesData')->name('amenities');
        Route::post('amenities/saveData','MasterDataController@amenitieSaveData')->name('amenities.save');
        Route::post('amenities/updateData','MasterDataController@amenitiesUpdateData')->name('amenities.update');
        Route::get('amenities/{amenitiesId}/edit','MasterDataController@amenitiesEditData')->name('amenities.edit');
        Route::get('amenities/{amenitiesId}/delete','MasterDataController@amenitiesDeleteData')->name('amenities.delete');

        //Team
        Route::get('teamMembers', 'TeamController@teamMembers')->name('team.members');
        Route::get('teamMembersList', 'TeamController@teamMembersList')->name('team.members.list');
        Route::get('teamMembers/{team_id}/{team_name}/edit','TeamController@teamMemberEdit')->name('team.edit');
        Route::get('teamMembers/{team_id}/delete','TeamController@teamMemberDelete')->name('team.delete');
        Route::post('teamMembers/saveData', 'TeamController@teamSaveMembers')->name('team.save');
        Route::post('teamMembers/updateData', 'TeamController@teamUpdateMembers')->name('team.update');

        //Partners & brands
        Route::get('PartnersBrands/Categories','PartnersbrandsController@categories')->name('partners.brands.categories');
        Route::post('PartnersBrands/CategorySave','PartnersbrandsController@categorySave')->name('partners.brands.categories.save');
        Route::post('PartnersBrands/CategoryUpdate','PartnersbrandsController@categoryUpdate')->name('partners.brands.categories.update');
        Route::get('PartnersBrands/{category_id}/CategoriesEdit','PartnersbrandsController@categoryEdit')->name('partners.brands.category.edit');
        Route::get('PartnersBrands/{category_id}/CategoriesDelete','PartnersbrandsController@categoryDelete')->name('partners.brands.category.delete');

        Route::get('PartnersBrands','PartnersbrandsController@PartnersBrands')->name('partners.brands');
        Route::post('PartnersBrandSave','PartnersbrandsController@PartnersBrandSave')->name('partners.brands.save');
        Route::post('PartnersBrandUpdate','PartnersbrandsController@PartnersBrandUpdate')->name('partners.brands.update');
        Route::get('PartnersBrands/{partnerBrand_id}/edit','PartnersbrandsController@PartnersBrandsEdit')->name('partners.brands.edit');
        Route::get('PartnersBrands/{partnerBrand_id}/delete','PartnersbrandsController@PartnersBrandsDelete')->name('partners.brands.delete');



        Route::get('gallery','GalleryController@gallery')->name('gallery');
        Route::post('gallery/saveAboutGallery','GalleryController@galleryAboutSave')->name('gallery.save.about');
        Route::post('gallery/updateAboutGallery','GalleryController@galleryAboutUpdate')->name('gallery.update.about');
        Route::post('gallery/uploadGallery','GalleryController@uploadGallery')->name('gallery.upload');
        Route::post('gallery/deleteImages','GalleryController@deleteGalleryImage')->name('gallery.images.delete');

        Route::get('design','DesignController@design')->name('design');
        Route::post('design/saveDesignData','DesignController@saveDesignData')->name('design.save');
        Route::post('design/updateDesignData','DesignController@updateDesignData')->name('design.update');
        Route::post('design/uploadDesignSliders','DesignController@uploadDesignSliders')->name('design.sliders.upload');
        Route::post('design/deleteImages','DesignController@deleteSliderImage')->name('design.images.delete');


        //Other Pages
        Route::get('otherPages','OtherPagesController@otherPages')->name('others.pages');
        Route::post('otherPageSave','OtherPagesController@otherPageSaveData')->name('other.pages.save');
        Route::post('otherPageUpdate','OtherPagesController@otherPageUpdateData')->name('other.pages.update');
        Route::get('otherPagesList','OtherPagesController@otherPagesList')->name('other.pages.list');
        Route::get('otherPages/{otherPageId}/edit','OtherPagesController@otherPagesEdit')->name('others.page.edit');
        Route::get('otherPages/{otherPageId}/delete','OtherPagesController@otherPagesDelete')->name('others.page.delete');


        Route::get('whatsNew/Categories','WhatsNewContoller@whatsNewCategories')->name('whatsNew.categories');
        Route::post('whatsNew/CategorySave','WhatsNewContoller@whatsNewCategorySave')->name('whatsNew.categories.save');
        Route::post('whatsNew/CategoryUpdate','WhatsNewContoller@categoryUpdate')->name('whatsNew.categories.update');
        Route::get('whatsNew/{category_id}/CategoriesEdit','WhatsNewContoller@categoryEdit')->name('whatsNew.category.edit');
        Route::get('whatsNew/{category_id}/CategoriesDelete','WhatsNewContoller@categoryDelete')->name('whatsNew.category.delete');

        Route::get('whatsNew','WhatsNewContoller@whatsNew')->name('whatsNew.add');
        Route::get('whatsNew/{whatsNewId}/edit','WhatsNewContoller@whatsNewEdit')->name('whatsNew.edit');
        Route::get('whatsNew/{whatsNewId}/delete','WhatsNewContoller@whatsNewDelete')->name('whatsNew.delete');
        Route::get('whatsNewList','WhatsNewContoller@whatsNewList')->name('whatsNew.list');
        Route::post('whatsNewSave','WhatsNewContoller@whatsNewSave')->name('whatsNew.save');
        Route::post('whatsNewUpdate','WhatsNewContoller@whatsNewUpdate')->name('whatsNew.update');


        Route::get('profile', 'AuthController@profile')->name('profile');
        Route::post('profileUpdate', 'AuthController@profileUpdate')->name('profile.update');

        //Whats on Media
        Route::get('whatsOnMedia','WhatsOnMediaController@whatsOnMediaIndex')->name('whatsOnMedia.add');
        Route::post('whatsOnMedia/save','WhatsOnMediaController@whatsOnMediaSave')->name('whatsOnMedia.save');
        Route::get('whatsOnMediaList','WhatsOnMediaController@whatsOnMediaList')->name('whatsOnMedia.list');
        Route::get('whatsOnMedia/{Id}/editData','WhatsOnMediaController@whatsOnMediaEdit')->name('whatsOnMedia.edit');
        Route::post('whatsOnMedia/update','WhatsOnMediaController@whatsOnMediaUpdate')->name('whatsOnMedia.update');
        Route::get('whatsOnMedia/{Id}/deleteData','WhatsOnMediaController@whatsOnMediaDelete')->name('whatsOnMedia.delete');

        //Press Releases
        Route::get('pressReleaseCategory','PressReleasesController@pressReleaseCategory')->name('press.releases.category');
        Route::post('pressReleaseCategorySave','PressReleasesController@pressReleaseCategorySave')->name('press.releases.category.save');
        Route::get('pressReleaseCategory/{Id}/editData','PressReleasesController@pressReleaseCategoryEdit')->name('press.releases.category.edit');
        Route::post('pressReleaseCategoryUpdate','PressReleasesController@pressReleaseCategoryUpdate')->name('press.releases.category.update');
        Route::get('pressReleaseCategory/{Id}/deleteData','PressReleasesController@pressReleaseCategoryDelete')->name('press.releases.category.delete');

        Route::get('pressReleaseAdd','PressReleasesController@pressReleaseIndex')->name('press.releases.add');
        Route::post('pressReleaseSave','PressReleasesController@pressReleaseSave')->name('press.releases.save');
        Route::get('pressReleaseList','PressReleasesController@pressReleaseList')->name('press.releases.list');
        Route::get('pressRelease/{Id}/editData','PressReleasesController@pressReleaseEdit')->name('press.releases.edit');
        Route::post('pressReleaseUpdate','PressReleasesController@pressReleaseUpdate')->name('press.releases.update');
        Route::get('pressRelease/{Id}/deleteData','PressReleasesController@pressReleaseDelete')->name('press.releases.delete');

        //Press Kit
        Route::get('pressKitCategory','PressKitController@pressKitCategory')->name('press.kit.category');
        Route::post('pressKitCategorySave','PressKitController@pressKitCategorySave')->name('press.kit.category.save');
        Route::get('pressKitCategory/{Id}/editData','PressKitController@pressKitCategoryEdit')->name('press.kit.category.edit');
        Route::post('pressKitCategoryUpdate','PressKitController@pressKitCategoryUpdate')->name('press.kit.category.update');
        Route::get('pressKitCategory/{Id}/deleteData','PressKitController@pressKitCategoryDelete')->name('press.kit.category.delete');

        Route::get('pressKitAdd','PressKitController@pressKitIndex')->name('press.kit.add');
        Route::post('pressKitSave','PressKitController@PressKitSave')->name('press.kit.save');
        Route::get('pressKitList','PressKitController@pressKitList')->name('press.kit.list');
        Route::get('pressKit/{Id}/editData','PressKitController@pressKitEdit')->name('press.kit.edit');
        Route::post('pressKitUpdate','PressKitController@pressKitUpdate')->name('press.kit.update');
        Route::get('pressKit/{Id}/deleteData','PressKitController@pressKitDelete')->name('press.kit.delete');

        //CSR
        Route::get('csrCategory','CsrController@csrCategory')->name('csr.category');
        Route::post('csrCategorySave','CsrController@csrCategorySave')->name('csr.category.save');
        Route::get('csrCategory/{Id}/editData','CsrController@csrCategoryEdit')->name('csr.category.edit');
        Route::post('csrCategoryUpdate','CsrController@csrCategoryUpdate')->name('csr.category.update');
        Route::get('csrCategory/{Id}/deleteData','CsrController@csrCategoryDelete')->name('csr.category.delete');

        Route::get('csrAdd','CsrController@csrIndex')->name('csr.add');
        Route::post('csrSave','CsrController@csrSave')->name('csr.save');
        Route::get('csrList','CsrController@csrList')->name('csr.list');
        Route::get('csr/{Id}/editData','CsrController@csrEdit')->name('csr.edit');
        Route::post('csrUpdate','CsrController@csrUpdate')->name('csr.update');
        Route::get('csr/{Id}/deleteData','CsrController@csrDelete')->name('csr.delete');

        //Sponsorships
        Route::get('sponsorshipsCategory','SponsorshipsController@sponsorshipsCategory')->name('sponsorships.category');
        Route::post('sponsorshipsCategorySave','SponsorshipsController@sponsorshipsCategorySave')->name('sponsorships.category.save');
        Route::get('sponsorshipsCategory/{Id}/editData','SponsorshipsController@sponsorshipsCategoryEdit')->name('sponsorships.category.edit');
        Route::post('sponsorshipsCategoryUpdate','SponsorshipsController@sponsorshipsCategoryUpdate')->name('sponsorships.category.update');
        Route::get('sponsorshipsCategory/{Id}/deleteData','SponsorshipsController@sponsorshipsCategoryDelete')->name('sponsorships.category.delete');

        Route::get('sponsorshipsAdd','SponsorshipsController@sponsorshipsIndex')->name('sponsorships.add');
        Route::post('sponsorshipsSave','SponsorshipsController@sponsorshipsSave')->name('sponsorships.save');
        Route::get('sponsorshipsList','SponsorshipsController@sponsorshipsList')->name('sponsorships.list');
        Route::get('sponsorships/{Id}/editData','SponsorshipsController@sponsorshipsEdit')->name('sponsorships.edit');
        Route::post('sponsorshipsUpdate','SponsorshipsController@sponsorshipsUpdate')->name('sponsorships.update');
        Route::get('sponsorships/{Id}/deleteData','SponsorshipsController@sponsorshipsDelete')->name('sponsorships.delete');
        Route::post('sponsorships_delete_image','SponsorshipsController@sponsorshipsDeleteImage')->name('sponsorships.delete.image');

        //Contact us
        Route::get('inquire-details','ContactUsController@inquiredetailsList')->name('inquire.details.list');

        Route::get('ContactUs','ContactUsController@contactUsIndex')->name('contactus.index');
        Route::post('ContactUs/saveDetails','ContactUsController@contactUsSave')->name('contactus.save');
        Route::post('ContactUs/updateDetails','ContactUsController@contactUsUpdate')->name('contactus.update');

        //Privacy policy - 1
        Route::get('PrivacyPolicy','OmniyatTCPController@PrivacyPolicyIndex')->name('privacy.policy.index');
        Route::post('PrivacyPolicy/saveData','OmniyatTCPController@PrivacyPolicySave')->name('privacy.policy.save');

        //Terms & conductions - 2
        Route::get('TermsAndConductions','OmniyatTCPController@TermsAndConductionsIndex')->name('terms.and.conductions.index');
        Route::post('TermsAndConductions/saveData','OmniyatTCPController@TermsAndConductionSave')->name('terms.and.conductions.save');

        //About Company - 1
        Route::get('AboutCompany','AboutController@aboutIndex')->name('about.company');
        Route::post('AboutCompany/saveAbout','AboutController@saveAbout')->name('about.company.save');
        Route::post('AboutCompany/updateAbout','AboutController@updateAbout')->name('about.company.update');

        Route::get('Philosophy','PhilosophyController@philosophyIndex')->name('philosophy.company');
        Route::post('Philosophy/saveAbout','PhilosophyController@savePhilosophy')->name('philosophy.company.save');
        Route::post('Philosophy/updateAbout','PhilosophyController@updatePhilosophy')->name('philosophy.company.update');

        //Chairman Newsletter - 2
        Route::get('chairmanNewsletter','AboutController@chairmanNewLetterIndex')->name('chairman.newsletter.index');
        //
        Route::get('leadership','LeadershipContoller@leadershipNew')->name('leadership.add');
        Route::get('leadership/{leadershipId}/edit','LeadershipContoller@leadershipEdit')->name('leadership.edit');
        Route::get('leadership/{leadershipId}/delete','LeadershipContoller@leadershipDelete')->name('leadership.delete');
        Route::get('leadershipList','LeadershipContoller@leadershipList')->name('leadership.list');
        Route::post('leadershipSave','LeadershipContoller@leadershipSave')->name('leadership.save');
        Route::post('leadershipUpdate','LeadershipContoller@leadershipUpdate')->name('leadership.update');

        Route::post('/leadershipUpdate/updateOrder','LeadershipContoller@leadershipUpdateOrderPage')->name('leadership.list.order.update');

        //sub title
        Route::post('sub_title_save','OmniyatTCPController@subTitleSave')->name('sub.title.save');        
    });
});