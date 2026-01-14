<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Post</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }
    </style>
</head>


<body class="bg-gray-100 min-h-screen p-6">

    <a href="/dashboard"
        class="inline-flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">

        <span class="material-symbols-outlined">
            arrow_back
        </span>

        Dashboard
    </a>


    <div class="max-w-6xl mx-auto bg-white shadow rounded-lg p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-700">📄 Daftar Post</h1>

            <a href="/tambahpost" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                + Tambah Post
            </a>
        </div>

        <div class="flex justify-between items-center mb-6">
            <a href="/Kategori" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">
                + Tambah Kategori
            </a>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Isi</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Id_Kategori</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <!-- Nomor urut aman pagination -->
                            <td class="px-4 py-3">
                                {{ $posts->firstItem() + $loop->index }}
                            </td>

                            <td class="px-4 py-3 font-semibold">
                                {{ $post->judul_post }}
                            </td>

                            <td class="px-4 py-3 truncate max-w-xs">
                                {{ $post->isi_post }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $post->tgl_post }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $post->id_kategori }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $post->kategori }}
                            </td>

                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 text-sm rounded-full
                                    {{ $post->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }}">
                                    {{ $post->status }}
                                </span>
                            </td>

                            <!-- Aksi -->
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ url('/editpost/' . $post->id_post) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ url('/hapuspost/' . $post->id_post) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $posts->links() }}
        </div>

    </div>

</body>

</html>
