<div class="d-md-flex gap-3 w-75 justify-content-around m-auto mt-3 ">
    <div class="d-flex gap-2 align-content-center w-50">
        <form method="post" action="{{route('importexcel')}}" enctype="multipart/form-data"
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
            <form action=" {{route('exportexcel')}}" method="get">
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="severity_filter" value="{{ request('severity_filter') }}">
                <button type="submit" class="btn btn-outline-success">Export Excel</button>
            </form>
        </div>
    </div>

    <form class="d-flex w-50" role="search" action=" /data" method="get">
        <div class="col-xxl-3 col-md-6">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select id="status" name="status[]" class="statusFilter form-select" multiple>
                <option></option>
                @if(Request::get('status'))
                    @foreach (Request::get('status') as $status )
                        <option value="{{ $status }}" selected>{{ $status }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-xxl-3 col-md-6">
            <label for="dataNumber" class="form-label fw-semibold">Data Number</label>
            <select id="dataNumber" name="data_number[]" class="dataNumberFilter form-select" multiple>
                <option></option>
                @if(Request::get('data_number'))
                    @foreach (Request::get('data_number') as $dataNumber )
                        <option value="{{ $dataNumber }}" selected>{{ $dataNumber }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-xxl-3 col-md-6">
            <label for="creator" class="form-label fw-semibold">Creator</label>
            <select id="creator" name="creator[]" class="creatorFilter form-select" multiple>
                <option></option>
                @if(Request::get('creator'))
                    @foreach (Request::get('creator') as $creator )
                        <option value="{{ $creator }}" selected>{{ $creator }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <button class="btn btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>