@include('backend.product.component.breakcrumb', ['title' => $config['seo']['index']['title']])
<div class="row">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{ $config['seo']['index']['table'] }}</h5>
            @include('backend.product.component.toolbox')
        </div>
        <div class="ibox-content">
            @include('backend.product.component.filter')
            @include('backend.product.component.table', ['tableTable' =>$config['seo']['index']['table']])
        </div>
    </div>
</div>
</div>