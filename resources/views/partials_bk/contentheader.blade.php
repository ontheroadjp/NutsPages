
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="nuts-text-navy">
        @yield('contentheader_title', 'Page Header here')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-home"></i> {{ _('Dashboard') }}</a></li>
        <li class="active">@yield('breadcrumb')</li>
    </ol>
</section>