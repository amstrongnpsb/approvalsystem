<div class="d-md-flex gap-3 w-75 justify-content-around m-auto mt-3 ">
    <div class="d-flex gap-2 align-content-center w-50">
        <form method="post" action="{{route('data.importexcel')}}" enctype="multipart/form-data"
            class="input-group d-flex align-content-center gap-2">
            @csrf
            <input type="file" class="form-control form-control-sm  @error('import_file') is-invalid @enderror"
                id="import_file" name="import_file">
            <button type="submit" class="btn btn-success btn-sm rounded-2 m-auto">
                Import Excel
            </button>
            @error('import_file')
            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </form>
        <div class="col-2">
        <form action=" {{route('data.exportexcel')}}" method="get">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <input type="hidden" name="severity_filter" value="{{ request('severity_filter') }}">
            <button type="submit" class="btn btn-outline-success">Export Excel</button>
        </form>
        </div>
        <a class="btn btn-outline-danger btn-sm col col-md-2 m-auto m-auto" href="{{route('data.exportpdf')}}">
            Export Pdf
        </a>
    </div>
    <form class="d-flex w-25" role="search" action=" /data" method="get">
        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search"
          value="{{ request('search') }}">
        <button class="btn btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>