<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1>Daftar Post</h1>
    @if (session('success'))
        <div class="bg-green-200 p-3 mb-3">
            {{ session('success') }}
        </div>
    @endif
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Status</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id_post }}</td>
                <td>{{ $post->judul_post }}</td>
                <td>{{ $post->isi_post }}</td>
                <td>{{ $post->tgl_post }}</td>
                <td>{{ $post->id_kategori }}</td>
                <td>{{ $post->status }}</td>
            </tr>
            <td>
                <a href="{{ url('/editpost/' . $post->id_post) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ url('/hapuspost/' . $post->id_post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapusdata ini?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        @endforeach
    </table>
    <div>
        {{ $posts->links() }}
    </div>
</body>

</html>
