<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            //AJAX DataTables

            var datatable = $('#crudTable').DataTable({
                ajax : {
                    url: '{!! url()->current() !!}'
                },
                "columns": [
                    { data: 'id', name: 'id', width: '5%'},
                    { data: 'name', name: 'name'},
                    { data: 'phone', name: 'phone'},
                    { data: 'courier', name: 'courier'},
                    { data: 'total_price', name: 'total_price'},
                    { data: 'status', name: 'status'},
                    {
                        data: 'action', name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "15%",
                    }
                ]
            });
         </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow overflow-auto md:overflow-scroll sm-rounded-md">
                <div class="py-4 px-5 sm:p-6 bg-white">
                    <table id="crudTable" class="overflow-auto md:overflow-scroll">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Kurir</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>