<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Kelas</th>
                <th>Keperluan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengunjung as $item)
                <tr>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->day }}</td>
                    <td>{{ $item->date_time }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->keperluan }}</td>
                    <td>
                        <form action="{{ route('maks.back', $item->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-danger">Keluar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
