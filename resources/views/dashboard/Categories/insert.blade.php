@extends('layout.dashboard')
@section('mydashboard')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section container">
      <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Horizontal Form</h5>
    
                  <!-- Horizontal Form -->
                  <form action="{{ url('/CategoriesStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" value="{{ old('Name') }}" name="Name">
                        @error('Name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                        
                          <input type="file" class="form-control" id="formFileLg" name="Img">
                          @error('Img')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                        </div>
                      </div> --}}
                   
                      <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputText" value="{{ old('Description') }}" name="Description">
                          @error('Description')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                        </div>
                      </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- End Horizontal Form -->
    
                </div>
              </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

@endsection
