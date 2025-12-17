@extends('layouts.app')

@section('headscripts')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-email.css') }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="app-email card">
            <div class="row g-0">
                <div class="col app-emails-list">
                    <div class="card shadow-none border-0 rounded-0">
                        <div class="card-body emails-list-header p-3 py-2">
                            <div class="d-flex justify-content-between align-items-center px-3 mt-2">
                                <div class="d-flex align-items-center w-100">
                                    <i class="icon-base ti tabler-menu-2 icon-lg cursor-pointer d-block d-lg-none me-4 mb-4" data-bs-toggle="sidebar" data-target="#app-email-sidebar" data-overlay></i>
                                    <div class="mb-4 w-100">
                                        <div class="input-group input-group-merge shadow-none">
                                            <span class="input-group-text border-0 ps-0 py-0" id="email-search">
                                                <i class="icon-base ti tabler-search icon-lg"></i>
                                            </span>
                                            <input type="text" class="form-control email-search-input border-0 py-0" placeholder="Search mail" aria-label="Search mail" aria-describedby="email-search" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mx-n3 emails-list-header-hr mb-2" />
                            <div class="d-flex justify-content-between align-items-center ps-1">
                                <div class="d-flex align-items-center">
                                    <div class="form-check mb-0 ms-2">
                                        <input class="form-check-input" type="checkbox" id="email-select-all" />
                                        <label class="form-check-label" for="email-select-all"></label>
                                    </div>
                                    <div class="btn btn-text-secondary btn-icon rounded-pill me-1">
                                        <i class="icon-base ti tabler-trash icon-22px email-list-delete cursor-pointer"></i>
                                    </div>
                                    <div class="btn btn-text-secondary btn-icon rounded-pill me-1">
                                        <i class="icon-base ti tabler-mail-opened icon-22px email-list-read cursor-pointer"></i>
                                    </div>
                                    <div class="dropdown me-1">
                                        <button class="btn btn-icon btn-text-secondary rounded-pill p-0" type="button" id="dropdownMenuFolderOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-base ti tabler-folder icon-22px"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuFolderOne">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="icon-base ti tabler-info-circle icon-sm me-1"></i>
                                                <span class="align-middle">Spam</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="icon-base ti tabler-file icon-sm me-1"></i>
                                                <span class="align-middle">Draft</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="icon-base ti tabler-trash icon-sm me-1"></i>
                                                <span class="align-middle">Trash</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="dropdown mx-1">
                                        <button class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="true" id="dropdownLabelOne">
                                            <i class="icon-base ti tabler-tag icon-22px"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabelOne">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="badge badge-dot bg-success me-1"></i>
                                                <span class="align-middle">Workshop</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="badge badge-dot bg-primary me-1"></i>
                                                <span class="align-middle">Company</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="badge badge-dot bg-warning me-1"></i>
                                                <span class="align-middle">Important</span>
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="badge badge-dot bg-danger me-1"></i>
                                                <span class="align-middle">Private</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="btn btn-icon btn-text-secondary rounded-pill me-1">
                                        <i class="icon-base ti tabler-refresh icon-22px scaleX-n1-rtl cursor-pointer email-refresh"></i>
                                    </span>
                                    <div class="dropdown">
                                        <button class="btn btn-icon btn-text-secondary rounded-pill p-0" type="button" id="emailsActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="emailsActions">
                                            <a class="dropdown-item" href="javascript:void(0)">Mark as read</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Mark as unread</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                            <a class="dropdown-item" href="javascript:void(0)">Archive</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="container-m-nx m-0" />
                        <div class="email-list pt-0">
                            <ul class="list-unstyled m-0">
                                @for ($i = 0; $i < 30; $i++)
                                <li class="email-list-item email-marked-read d-flex align-items-center" data-starred="true" data-bs-toggle="sidebar" data-target="#app-email-view">
                                    <div class="d-flex align-items-center w-100">
                                        <div class="form-check mb-0 ms-2">
                                            <input class="email-list-item-input form-check-input" type="checkbox" id="email-1" />
                                            <label class="form-check-label" for="email-1"></label>
                                        </div>
                                        <span class="ms-sm-3 me-4 d-sm-inline-block d-none">
                                            <i class="email-list-item-bookmark icon-base ti tabler-star icon-md cursor-pointer ms-1"></i>
                                        </span>
                                        <img src="../../assets/img/avatars/1.png" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-2 me-0" height="32" width="32" />
                                        <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                                            <span class="email-list-item-username me-2 text-heading">Chandler Bing</span>
                                            <span class="email-list-item-subject d-xl-inline-block d-block">
                                                Focused impactful open issues from the project of GitHub
                                            </span>
                                        </div>
                                        <div class="email-list-item-meta ms-auto d-flex align-items-center">
                                            <span class="email-list-item-label badge badge-dot bg-danger d-none d-md-inline-block me-2" data-label="private"></span>
                                            <small class="email-list-item-time text-body-secondary">08:40 AM</small>
                                            <ul class="list-inline email-list-item-actions">
                                                <li class="list-inline-item email-unread btn btn-icon btn-text-secondary rounded-pill">
                                                    <i class="icon-base ti tabler-mail icon-md"></i>
                                                </li>
                                                <li class="list-inline-item email-delete btn btn-icon btn-text-secondary rounded-pill">
                                                    <i class="icon-base ti tabler-trash icon-md"></i>
                                                </li>
                                                <li class="list-inline-item btn btn-icon btn-text-secondary rounded-pill">
                                                    <i class="icon-base ti tabler-info-circle icon-md"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endfor
                            </ul>
                            <ul class="list-unstyled m-0">
                                <li class="email-list-empty text-center d-none">No items found.</li>
                            </ul>
                        </div>
                    </div>
                <div class="app-overlay"></div>
            </div>

            <div class="col app-email-view flex-grow-0 bg-lighter" style="min-width: 100%" id="app-email-view">
                <div class="card shadow-none border-0 rounded-0 app-email-view-header p-5 pt-md-4 py-2">
                    <!-- Email View : Title  bar-->
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center overflow-hidden">
                            <span class="ms-sm-2 me-4">
                                <i class="icon-base ti tabler-chevron-left icon-md cursor-pointer scaleX-n1-rtl" data-bs-toggle="sidebar" data-target="#app-email-view"></i>
                            </span>
                            <h6 class="text-truncate mb-0 me-2 fw-normal">Focused impactful open issues</h6>
                            <span class="badge bg-label-warning rounded-pill">Important</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="btn btn-icon p-0 me-2 text-body-secondary">
                                <i class="icon-base ti tabler-chevron-left icon-22px scaleX-n1-rtl"></i>
                            </span>
                            <span class="btn btn-icon p-0">
                                <i class="icon-base ti tabler-chevron-right icon-22px scaleX-n1-rtl"></i>
                            </span>
                        </div>
                    </div>
                    <hr class="app-email-view-hr mx-n5 mb-2" />
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="btn btn-icon btn-text-secondary rounded-pill me-1">
                                <i class="icon-base ti tabler-trash icon-22px cursor-pointer"></i>
                            </span>
                            <span class="btn btn-icon btn-text-secondary rounded-pill me-1">
                                <i class="icon-base ti tabler-mail icon-22px cursor-pointer" data-bs-toggle="sidebar" data-target="#app-email-view"></i>
                            </span>
                            <div class="dropdown">
                                <button class="btn btn-icon btn-text-secondary rounded-pill p-0 me-1" type="button" id="dropdownMenuFolderTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-base ti tabler-folder icon-22px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuFolderTwo">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-alert-octagon me-1"></i>
                                        <span class="align-middle">Spam</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-edit me-1"></i>
                                        <span class="align-middle">Draft</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-trash me-1"></i>
                                        <span class="align-middle">Trash</span>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-icon btn-text-secondary rounded-pill p-0" type="button" id="dropdownLabelTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-base ti tabler-tag icon-22px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabelTwo">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="badge badge-dot bg-success me-1"></i>
                                        <span class="align-middle">Workshop</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="badge badge-dot bg-primary me-1"></i>
                                        <span class="align-middle">Company</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="badge badge-dot bg-info me-1"></i>
                                        <span class="align-middle">Important</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="btn btn-icon btn-text-secondary rounded-pill p-0">
                                <i class="icon-base ti tabler-star icon-22px"></i>
                            </span>
                            <div class="dropdown ms-1">
                                <button class="btn btn-icon btn-text-secondary rounded-pill p-0" type="button" id="dropdownMoreOptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMoreOptions">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-mail me-1"></i>
                                        <span class="align-middle">Mark as unread</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-mail-opened me-1"></i>
                                        <span class="align-middle">Mark as read</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-star icon-sm me-1"></i>
                                        <span class="align-middle">Add star</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-calendar me-1"></i>
                                        <span class="align-middle">Create Event</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-volume-off me-1"></i>
                                        <span class="align-middle">Mute</span>
                                    </a>
                                    <a class="dropdown-item d-sm-none d-block" href="javascript:void(0)">
                                        <i class="icon-base ti tabler-printer me-1"></i>
                                        <span class="align-middle">Print</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="m-0" />
                    <div class="app-email-view-content py-4">
                        <div class="card email-card mx-sm-6 mx-3 mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap border-bottom">
                            <div class="d-flex align-items-center mb-sm-0 mb-3">
                                <img src="../../assets/img/avatars/1.png" alt="user-avatar" class="flex-shrink-0 rounded-circle me-4" height="38" width="38" />
                                <div class="flex-grow-1 ms-1">
                                    <h6 class="m-0 fw-normal">Chandler Bing</h6>
                                    <small class="text-body">iAmAhoot@email.com</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 me-4 text-body-secondary">June 20th 2020, 08:10 AM</p>
                                <span class="btn btn-icon btn-text-secondary rounded-pill"
                                    ><i class="icon-base ti tabler-paperclip icon-22px cursor-pointer"></i>
                                </span>
                                <span class="btn btn-icon btn-text-secondary rounded-pill"
                                    ><i class="icon-base ti tabler-star icon-22px cursor-pointer"></i>
                                </span>
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" id="dropdownEmailTwo" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmailTwo">
                                        <a class="dropdown-item scroll-to-reply" href="javascript:void(0)">
                                            <i class="icon-base ti tabler-corner-up-left me-1"></i>
                                            <span class="align-middle">Reply</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="icon-base ti tabler-corner-up-right me-1"></i>
                                            <span class="align-middle">Forward</span>
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="icon-base ti tabler-alert-octagon me-1"></i>
                                            <span class="align-middle">Report</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <p class="fw-medium">Greetings!</p>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less
                                normal distribution of letters, as opposed to using 'Content here, content here',making it
                                look like readable English.
                            </p>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't look
                                even slightly believable.
                            </p>
                            <p class="mb-0">Sincerely yours,</p>
                            <p class="fw-medium mb-0">Envato Design Team</p>
                            <hr />
                            <p class="text-body-secondary mb-2">Attachments</p>
                            <div class="cursor-pointer">
                                <i class="icon-base ti tabler-file"></i>
                                <span class="align-middle ms-1">report.xlsx</span>
                            </div>
                        </div>
                        </div>
                        <!-- Email View : Reply mail-->
                        <div class="email-reply card mt-4 mx-sm-6 mx-3 mb-4">
                            <h6 class="card-header border-0 fw-normal pb-4">Reply to Ross Geller</h6>
                            <div class="card-body pt-0 ps-3">
                                <div class="d-flex justify-content-start">
                                    <div class="email-reply-toolbar border-0 w-100 ps-0 pb-4">
                                        <span class="ql-formats me-0">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                            <button class="ql-link"></button>
                                            <button class="ql-image"></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="email-reply-editor"></div>
                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <div class="cursor-pointer btn btn-text-secondary text-secondary me-4 px-3">
                                        <i class="icon-base ti tabler-paperclip icon-xs text-heading me-2"></i>
                                        <span class="align-middle">Attachments</span>
                                    </div>
                                    <button class="btn btn-primary">
                                        <span class="align-middle">Send</span>
                                        <i class="icon-base ti tabler-send icon-xs ms-2 scaleX-n1-rtl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/app-email.js') }}"></script>
@endsection
