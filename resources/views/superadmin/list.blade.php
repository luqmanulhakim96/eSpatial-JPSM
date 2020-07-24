@extends('layouts.app')
@section('content')
            <!--Page Body part -->
            <div class="page-body p-4 text-dark">
                <div class="page-heading border-bottom d-flex flex-row">
                    <!-- <h5 class="font-weight-normal">Version 1</h5>
                    <small class="mt-2 ml-2">Dashboard</small> -->
                </div>
                <!-- Small card component -->

                <div class="card rounded-lg">
                  <div class="card-body">
                      <div class="card-title">Senarai Pengguna Admin</div>
                      <a class="btn btn-primary mb-2" href="{{ route('superadmin.add') }}">Tambah Pengguna</a>
                        <!-- Tab nav -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-active-tab" data-toggle="pill" href="#pills-active" role="tab" aria-controls="pills-active" aria-selected="true">Pengguna Aktif</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-deactivate-tab" data-toggle="pill" href="#pills-deactivate" role="tab" aria-controls="pills-deactivate" aria-selected="false">Pengguna Nyahaktif</a>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab">
                              <table class="table table-striped table-bordered" id="responsiveDataTable" style="width: 100%;">

                                <thead>
                                  <tr>
                                    <th class="all">Nama</th>
                                    <th class="all">Email</th>
                                    <th class="all">Peranan</th>
                                    <th class="all">Kad Pengenalan</th>
                                    <th class="all">Butang Tindakan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($user as $data)
                                  <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email  }}</td>
                                    @if($data->role == 0)
                                    <td> Pentadbir Sistem (Admin) </td>
                                    @elseif($data->role == 1)
                                    <td> Penyokong 1 </td>
                                    @elseif($data->role == 2)
                                    <td> Penyokong 2 </td>
                                    @elseif($data->role == 3)
                                    <td> Ketua Pengarah </td>
                                    @elseif($data->role == 4)
                                    <td> Superadmin </td>
                                    @endif
                                    <td>{{ $data->kad_pengenalan }}</td>
                                    <td class="p-3">
                                          <div class="d-flex flex-row justify-content-around align-items-center">
                                              <a href="{{ route('superadmin.edit', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                              <a href="{{ route('superadmin.delete', $data->id) }}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
                                          </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>

                            <div class="tab-pane fade" id="pills-deactivate" role="tabpanel" aria-labelledby="pills-deactivate-tab">
                              <div class="table-responsive">

                              <table class="table table-striped table-bordered" id="responsiveDataTable2" style="width: 100%;">

                                <thead>
                                  <tr>
                                    <th class="all">Nama</th>
                                    <th class="all">Email</th>
                                    <th class="all">Peranan</th>
                                    <th class="all">Kad Pengenalan</th>
                                    <th class="all">Butang Tindakan</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($user_deact as $data)
                                  <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email  }}</td>
                                    @if($data->role == 0)
                                    <td> Pentadbir Sistem (Admin) </td>
                                    @elseif($data->role == 1)
                                    <td> Penyokong 1 </td>
                                    @elseif($data->role == 2)
                                    <td> Penyokong 2 </td>
                                    @elseif($data->role == 3)
                                    <td> Ketua Pengarah </td>
                                    @elseif($data->role == 4)
                                    <td> Superadmin </td>
                                    @endif
                                    <td>{{ $data->kad_pengenalan }}</td>
                                    <td class="p-3">
                                          <div class="d-flex flex-row justify-content-around align-items-center">
                                              <a href="{{ route('superadmin.edit', $data->id) }}" class="btn btn-success mr-1"><i class="fas fa-pencil-alt"></i></a>
                                              <a href="{{ route('superadmin.delete', $data->id) }}" class="btn btn-danger"><i class="fas fa-times-circle"></i></a>
                                          </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                              
                            </div>
                      </div>
                    </div>
                </div>
            </main>
@endsection
