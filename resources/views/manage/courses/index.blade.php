<x-manage title="الدورات">
    <x-slot name="css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@voerro/vue-tagsinput@2.7.0/dist/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"/>
    </x-slot>
    <x-slot name="headerPage">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الدورات</h1>
        </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{route('courses.create') }}"
                   class="btn btn-sm btn-primary">
                    <i class="fas fa-plus fs-4 me-2"></i>
                    إضافة دورة</a>
            </div>
    </x-slot>
    <courses :csrf="`{{csrf_token()}}`"
             :can_edit="{{json_encode(Auth::user()->hasAbility('courses.update'))}}"
             :can_delete="{{json_encode(Auth::user()->hasAbility('courses.delete'))}}"
             :can_view="{{json_encode(Auth::user()->hasAbility('courses.view'))}}"></courses>

    <x-slot name="js">

    </x-slot>
</x-manage>

