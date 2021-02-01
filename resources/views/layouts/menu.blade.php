<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-3" aria-expanded="false" aria-controls="ui-3">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Company</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.company')}}">About Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('philosophy.company')}}">Philosophy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('leadership.list')}}">Leadership List</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('whatsNew.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">What's New</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-4" aria-expanded="false" aria-controls="ui-4">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Portfolio</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories')}}">Categories</a>
                    </li><!-- 
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('portfolio.add')}}">Add Portfolio</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('portfolio.list')}}">Portfolio</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-5" aria-expanded="false" aria-controls="ui-5">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Media</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-5">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsOnMedia.list')}}">What's on Media</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.releases.list')}}">Press Releases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.kit.list')}}">Press Kit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.kit.category')}}">Press Kit Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('csr.list')}}">Csr</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sponsorships.list')}}">Sponsorships</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sponsorships.category')}}">Sponsorship Categories</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('inquire.details.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Inquire List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('contactus.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Contact Us</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('privacy.policy.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Privacy policy</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('terms.and.conductions.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Terms & Conditions</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiTeamMemebers" aria-expanded="false" aria-controls="uiTeamMemebers">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Team</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiTeamMemebers">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('team.members')}}">Add Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('team.members.list')}}">Team List</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiPartnersBrands" aria-expanded="false" aria-controls="uiPartnersBrands">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Partners & Brands</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiPartnersBrands">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('partners.brands.categories')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('partners.brands')}}">Partners & Brands</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('gallery')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Gallery</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('design')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Design</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-3" aria-expanded="false" aria-controls="ui-3">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Portfolio</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('portfolio.add')}}">Add Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('portfolio.list')}}">Portfolio List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-4" aria-expanded="false" aria-controls="ui-4">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Feature Projects</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-4">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('addFeatureProject')}}">Add FeatureProject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('featureProjectList')}}">FeatureProjects List</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('whatsNew.list')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">WhatsNew</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiWhatsNew" aria-expanded="false" aria-controls="uiWhatsNew">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Whats New</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiWhatsNew">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsNew.categories')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsNew.add')}}">WhatsNew</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsNew.list')}}">WhatsNew List</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#WhatsOnMedia" aria-expanded="false" aria-controls="WhatsOnMedia">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Whats On Media</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="WhatsOnMedia">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsOnMedia.add')}}">Add New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsOnMedia.list')}}">List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiOtherPages" aria-expanded="false" aria-controls="uiOtherPages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Other Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiOtherPages">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('others.pages')}}">Add OtherPage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('other.pages.list')}}">OtherPages List</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiWhatsNew" aria-expanded="false" aria-controls="uiWhatsNew">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Whats New</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiWhatsNew">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsNew.categories')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsNew.add')}}">WhatsNew</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('whatsNew.list')}}">WhatsNew List</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pressReleases" aria-expanded="false" aria-controls="pressReleases">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Press Releases</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pressReleases">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.releases.category')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.releases.add')}}">Add Press Releases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.releases.list')}}">Press Releases List</a>
                    </li>

                </ul>
            </div>
        </li>

        </li><li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pressKit" aria-expanded="false" aria-controls="pressKit">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Press Kit</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pressKit">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.kit.category')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.kit.add')}}">Add Press Kit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('press.kit.list')}}">Press Kit List</a>
                    </li>
                </ul>
            </div>
        </li>

        </li><li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#csr" aria-expanded="false" aria-controls="csr">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">CSR</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="csr">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('csr.category')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('csr.add')}}">Add Csr</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('csr.list')}}">Csr List</a>
                    </li>
                </ul>
            </div>
        </li>

        </li><li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Sponsorships" aria-expanded="false" aria-controls="Sponsorships">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Sponsorships</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Sponsorships">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sponsorships.category')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sponsorships.add')}}">Add Sponsorships</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sponsorships.list')}}">Sponsorships List</a>
                    </li>
                </ul>
            </div>
        </li>

        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiLeadership" aria-expanded="false" aria-controls="uiLeadership">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Leadership</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="uiLeadership">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('leadership.add')}}">Leadership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('leadership.list')}}">Leadership List</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cmsPages" aria-expanded="false" aria-controls="cmsPages">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">CMS Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cmsPages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.company')}}">About Omniyat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('philosophy.company')}}">Philosophy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('chairman.newsletter.index')}}">Chairman Newsletter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contactus.index')}}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('privacy.policy.index')}}">Privacy policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('terms.and.conductions.index')}}">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </li> -->
    </ul>
</nav>