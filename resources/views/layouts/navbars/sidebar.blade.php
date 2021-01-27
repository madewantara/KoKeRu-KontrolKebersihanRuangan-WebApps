<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal text-center">{{ _('Kokeru') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-notes"></i>
                    <p>{{ _('Distribusi') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="deactive " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-paper"></i>
                    <p>{{ _('Laporan') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>