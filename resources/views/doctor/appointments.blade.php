@extends('layouts.admin')
@section('title')
Liste Rendez-vous
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des Rendez-vous</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Nom </th>
                                <th scope="col">Email</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Date</th>
                                <th scope="col">Message</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $appoint )
                            <tr>
                                <td scope="row"> {{$appoint->nom}}</td>
                                <td scope="row"> {{$appoint->email}}</td>
                                <td scope="row"> {{$appoint->telephone}}</td>
                                <td scope="row"> {{$appoint->date}}</td>
                                <td scope="row"> {{$appoint->message}}</td>
                                <td scope="row"> {{$appoint->etat}} </td>
                                <td class="d-flex">
                                    <a type="button" href="{{route('approve', $appoint->id)}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                                    <span style="margin-left: 6px;"></span>
                                    <a type="button" href="{{route('disapprove', $appoint->id)}}" class="btn btn-danger"><i class="bi bi-x"></i></a>
                                    <span style="margin-left: 6px;"></span>
                                    <a type="button" href="{{ route('detailAppointment', ['id' => $appoint]) }}"class="btn btn-info"><i class="bi bi-info-square"></i></a>
                                    <span style="margin-left: 6px;"></span>
                                    <a type="button" href="{{ route('rendezvous.edit', ['rendezvous' => $appoint->id]) }}" class="btn btn-warning"><i class="ri-ball-pen-line"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection