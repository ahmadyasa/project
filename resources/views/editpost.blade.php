<!DOCTYPE html>
<html lang="en">

<head></head>

<body>
    <h2>Edit Post</h2>
    <form action="{{ url('/editpost/' . $post->id_post) }}" method="post">
        @csrf
        <div class="mb-3">
            <label>Judul Post</label>
            <input type="text" name="judul_post" class="form-control" value="{{ $post->judul_post }}" required>
        </div>
        <div class="mb-3">
            <label>Isi Post</label>
            <textarea name="isi_post" class="form-control" required>{{ $post->isi_post }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal Post</label>
            <input type="date" name="tgl_post" class="form-control" value="{{ $post->tgl_post }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                @foreach ($kategori as $k)
                    <option value="{{ $k->kategori }}" @if ($k->kategori == $post->kategori) selected @endif>
                        {{ $k->kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</body>

</html>
