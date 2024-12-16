<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards"  aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span>Gestion</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Usuarios
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('users.index')}}" class="nav-link">Usuarios</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('roles.index')}}" class="nav-link">Roles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('permisos.index')}}" class="nav-link">Permisos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('asignar-rol')}}" class="nav-link">Asignar Rol Usuario</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEcommerce">Personas                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        
                                        <li class="nav-item">
                                            <a href="{{route('clients.index')}}" class="nav-link">Clientes</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="{{route('supliers.index')}}" class="nav-link">Proveedores</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('staff.index')}}" class="nav-link">Personal</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProjects">Inventario                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProjects">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('categories.index')}}" class="nav-link">Categorias</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('products.index')}}" class="nav-link">Productos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-projects-create" class="nav-link">Manillas</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTasks">Tasks                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tasks-kanban" class="nav-link">Kanban Board</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-list-view" class="nav-link">List View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tasks-details" class="nav-link">Task Details</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCRM">CRM                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crm-contacts" class="nav-link">Contacts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-companies" class="nav-link">Companies</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-deals" class="nav-link">Deals</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crm-leads" class="nav-link">Leads</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrypto">Crypto                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-crypto-transactions" class="nav-link">Transactions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-buy-sell" class="nav-link">Buy & Sell</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-orders" class="nav-link">Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-wallet" class="nav-link">My Wallet</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-ico" class="nav-link">ICO List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-crypto-kyc" class="nav-link">KYC Application</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices">Invoices                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-invoices-list" class="nav-link">List View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-details" class="nav-link">Invoice Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-invoices-create" class="nav-link">Create Invoice</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTickets">Support Tickets                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list" class="nav-link">List View</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-tickets-details" class="nav-link">Ticket Details</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarnft" data-key="t-nft-marketplace">
                                    NFT Marketplace <span class="badge badge-pill bg-danger" data-key="t-new">New</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarnft">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-nft-marketplace" class="nav-link" data-key="t-marketplace"> Marketplace </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-explore" class="nav-link" data-key="t-explore-now"> Explore Now </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-auction" class="nav-link" data-key="t-live-auction"> translation.auction </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-item-details" class="nav-link" data-key="t-item-details"> Item Details </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-collections" class="nav-link" data-key="t-collections"> Collections </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-creators" class="nav-link" data-key="t-creators"> Creators </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-ranking" class="nav-link" data-key="t-ranking"> Ranking </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-wallet" class="nav-link" data-key="t-wallet-connect"> Wallet Connect </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-nft-create" class="nav-link" data-key="t-create-nft"> Create NFT </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Pages</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri-account-circle-line"></i> <span>Authentication</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn">Sign In                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signin-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signin-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignUp">Sign Up                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignUp">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-signup-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-signup-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarResetPass">Password Reset                                </a>
                                <div class="collapse menu-dropdown" id="sidebarResetPass">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-pass-reset-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarchangePass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarchangePass">Password Create                                </a>
                                <div class="collapse menu-dropdown" id="sidebarchangePass">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-pass-change-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-pass-change-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarLockScreen" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLockScreen">Lock Screen                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLockScreen">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-lockscreen-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-lockscreen-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#sidebarLogout" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLogout">Logout                                </a>
                                <div class="collapse menu-dropdown" id="sidebarLogout">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-logout-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-logout-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSuccessMsg" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSuccessMsg">Success Message                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSuccessMsg">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-success-msg-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-success-msg-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTwoStep" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTwoStep">Two Step Verification                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTwoStep">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-twostep-basic" class="nav-link">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-twostep-cover" class="nav-link">Cover</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors">Errors                                </a>
                                <div class="collapse menu-dropdown" id="sidebarErrors">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="auth-404-basic" class="nav-link">404 Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-cover" class="nav-link">404 Cover</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-404-alt" class="nav-link">404 Alt</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-500" class="nav-link">500</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="auth-offline" class="nav-link">Offline Page</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-title"><i class="ri-more-fill"></i> <span>Components</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                        <i class="ri-pencil-ruler-2-line"></i> <span>Base UI</span>
                    </a>
                    <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-alerts" class="nav-link">Alerts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-badges" class="nav-link">Badges</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-buttons" class="nav-link">Buttons</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-colors" class="nav-link">Colors</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-cards" class="nav-link">Cards</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-carousel" class="nav-link">Carousel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-dropdowns" class="nav-link">Dropdowns</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-grid" class="nav-link">Grid</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-images" class="nav-link">Images</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-tabs" class="nav-link">Tabs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-accordions" class="nav-link">Accordion & Collapse</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-modals" class="nav-link">Modals</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-offcanvas" class="nav-link">Offcanvas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-placeholders" class="nav-link">Placeholders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-progress" class="nav-link">Progress</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-notifications" class="nav-link">Notifications</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="ui-media" class="nav-link">Media object</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-embed-video" class="nav-link">Embed Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-typography" class="nav-link">Typography</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-lists" class="nav-link">Lists</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-general" class="nav-link">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-ribbons" class="nav-link">Ribbons</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="ui-utilities" class="nav-link">Utilities</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>