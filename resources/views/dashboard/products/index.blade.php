@extends('layout.dashboard')
@section('mydashboard')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Products Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> --}}

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>
                      <b>N</b>ame
                    </th>
                    <th>Img</th>
                    <th>Desc</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Date Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                @endphp
                @foreach ($product as $ct)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $ct->Name }}</td>
                        <td><a href="{{ $ct->Img }}" data-lightbox="roadtrip" class="data"><img src="{{ $ct->Img }}" width="80px" height="50px" class="rounded" alt=""></a></td>
                        <td style="width:30%;"><p style="height:50px; overflow:auto;">{{ $ct->Description }}</p></td>
                        <td>{{ $ct->category->Name}}</td>
                        <td>{{ $ct->Price }}</td>
                        <td>{{ $ct->Status }}</td>
                        <td>{{ $ct->updated_at=date("Y-m-d") }}</td><td>
                        <a href="{{ url('/Productsedit') }}/{{ $ct->id }}" class="btn btn-warning">Edit</a>
                            <button onclick="myfun({{ $ct->id }})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  
<script>
    function myfun(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'

                )
                window.location.href="{{ url('/Productsdelete') }}/"+id
            }
        })
        // if (ans) {
        //     var ans = confirm("Do you want to delete ?")

        // }
    }
</script>
@endsection