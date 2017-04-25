<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#form"
           role="tab"
           data-toggle="tab">Default Form</a></li>
    <li role="presentation">
        <a href="#default_data"
           role="tab"
           data-toggle="tab">Edit Form Fields</a></li>
</ul>


<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="form">
        @include('webforms::_data')
    </div>
    <div role="tabpanel" class="tab-pane" id="default_data">
        @include('webforms::_default_data')
    </div>
</div>




