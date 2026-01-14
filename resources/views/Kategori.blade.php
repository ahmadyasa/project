<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Manajemen Kategori</title>
</head>

<body class="bg-slate-100 min-h-screen p-10">

    <div class="max-w-3xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-slate-800">📂 Manajemen Kategori</h1>

            <button onclick="openModal()"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition">
                + Tambah
            </button>
        </div>

        <!-- CARD -->
        <div class="bg-white rounded-xl shadow-lg p-6">

            <!-- LIST -->
            <ul class="space-y-4">
                @foreach ($data as $d)
                    <li
                        class="flex justify-between items-center p-4 border rounded-lg hover:shadow transition bg-slate-50">

                        <div>
                            <p class="text-xs text-slate-400">ID {{ $d->id_kategori }}</p>
                            <p class="text-lg font-semibold text-slate-800">{{ $d->kategori }}</p>
                        </div>

                        <div class="flex gap-2">
                            <!-- EDIT -->
                            <button onclick="openEdit('{{ $d->id_kategori }}','{{ $d->kategori }}')"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm transition">
                                Edit
                            </button>

                            <!-- DELETE -->
                            <form action="{{ route('destroy_kategori', $d->id_kategori) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

    <!-- MODAL TAMBAH -->
    <div id="modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center">
        <div class="bg-white w-96 p-6 rounded-xl shadow-xl animate-fade">
            <h2 class="text-xl font-bold mb-4 text-slate-800">Tambah Kategori</h2>

            <form action="/store_kategori" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="kategori" placeholder="Nama kategori"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 outline-none">

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-slate-300 rounded-lg hover:bg-slate-400">
                        Batal
                    </button>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div id="editModal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center">
        <div class="bg-white w-96 p-6 rounded-xl shadow-xl">
            <h2 class="text-xl font-bold mb-4">Edit Kategori</h2>

            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="text" id="editKategori" name="kategori"
                    class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 outline-none">

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeEdit()"
                        class="px-4 py-2 bg-slate-300 rounded-lg hover:bg-slate-400">
                        Batal
                    </button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function openEdit(id, kategori) {
            document.getElementById('editKategori').value = kategori;
            document.getElementById('editForm').action = `/update_kategori/${id}`;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEdit() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>

</body>

</html>
