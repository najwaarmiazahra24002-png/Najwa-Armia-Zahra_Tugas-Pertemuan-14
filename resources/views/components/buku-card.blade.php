<div class="card h-100 shadow-sm">

    <div class="card-body d-flex flex-column">

        {{-- Checkbox --}}
        <div class="text-end">
            <input type="checkbox"
                   name="buku_ids[]"
                   value="{{ $buku->id }}">
        </div>

        {{-- Icon Buku --}}
        <div class="text-center mb-3">
            <i class="bi bi-book-fill text-primary" style="font-size:70px;"></i>
        </div>

        {{-- Judul --}}
        <h5 class="card-title text-center fw-bold">
            {{ $buku->judul }}
        </h5>

        <p class="mb-1">
            <strong>Pengarang:</strong><br>
            {{ $buku->pengarang }}
        </p>

        <p class="mb-1">
            <strong>Harga:</strong><br>
            Rp {{ number_format($buku->harga,0,',','.') }}
        </p>

        <p class="mb-2">
            <strong>Stok:</strong>
            {{ $buku->stok }}
        </p>

        <div class="mb-2">
            <span class="badge bg-primary">
                {{ $buku->kategori }}
            </span>
        </div>

        <div class="mb-3">
            @if($buku->stok > 0)
                <span class="badge bg-success">
                    Tersedia
                </span>
            @else
                <span class="badge bg-danger">
                    Habis
                </span>
            @endif
        </div>

        {{-- Tombol selalu di bawah --}}
        @if($showActions)
        <div class="mt-auto d-grid gap-2">

            <a href="{{ route('buku.show',$buku->id) }}"
               class="btn btn-info text-white btn-sm">
                <i class="bi bi-eye"></i> Detail
            </a>

            <a href="{{ route('buku.edit',$buku->id) }}"
               class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>

            <form action="{{ route('buku.destroy',$buku->id) }}"
                  method="POST"
                  class="delete-form">
                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn btn-danger btn-sm w-100 btn-delete"
                    data-judul="{{ $buku->judul }}">
                    <i class="bi bi-trash"></i> Hapus
                </button>

            </form>

        </div>
        @endif

    </div>

</div>