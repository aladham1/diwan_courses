<x-manage title="إضافة دورة جديدة">
    <x-slot name="headerPage">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">إضافة دورة جديدة</h1>
        </div>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <new-course :csrf="`{{csrf_token()}}`"></new-course>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $(document).ready(function () {
                $(".date").flatpickr();
            });
        </script>
    </x-slot>
</x-manage>

