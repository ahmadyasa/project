<!DOCTYPE html>
<html>

<head>
    <title>Tambah Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-10">
    <h2 class="text-2xl mb-5 font-bold">Tambah Post Baru</h2>
    <form action="/tambahpost" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Judul Post</label>
            <input type="text" name="judul_post" class="border p-2 w-full">
        </div>
        <div>
            <label>Isi Post</label>
            <textarea name="isi_post" class="border p-2 w-full"></textarea>
        </div>
        <div>
            <label>Tanggal Post</label>
            <input type="text" name="tgl_post" placeholder="2024-11-28" class="border p-2 w-full">
        </div>
        <div>
            <label>ID Kategori</label>
            <input type="number" name="id_kategori" class="border p-2 w-full">
        </div>
        <div>
            <label>Status</label>
            <input type="number" name="status" class="border p-2 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-5 py-2rounded">
            Simpan Data
        </button>
    </form>
</body>

</html>
