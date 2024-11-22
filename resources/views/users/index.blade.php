@extends('layouts.admin')
@section('title')
Dashboard-Liste utilisateurs
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des Utilisateurs</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Nom et prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            @foreach($user->roles as $role)
                                @if($role->nom !== "admin")
                                <tr>
                                    <td scope="row">{{$user->nom}} {{$user->prenom}}</td>
                                    <td scope="row">{{$user->email}}</td>
                                    <td scope="row">{{$user->adresse}}</td>
                                    <td scope="row">{{$user->telephone}}</td>
                                    <td scope="row">
                                        @foreach($user->roles as $role)
                                            {{ $role->nom }}<br>
                                        @endforeach</td>
                                    <td class="d-flex">
                                        <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable{{$user->id}}"><i class="bi bi-info-lg"></i></a>

                                        <div class="modal fade" id="modalDialogScrollable{{$user->id}}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Détails de l'utilisateur</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <p>Nom : {{$user->nom}}</p>
                                                        <p>Prénom : {{$user->prenom}}</p>
                                                        <p>Téléphone : {{$user->telephone}}</p>
                                                        <p>Adresse : {{$user->adresse}}</p>
                                                        @if($user->roles->contains('nom', 'medecin'))
                                                            <p>Spécialité : {{$user->specialite}}</p>
                                                        @endif
                                                        @if($user->roles->contains('nom', 'patient'))
                                                            <p>Numéro de sécurité sociale : {{$user->secu_social}}</p>
                                                        @endif
                                                        <p>Adresse Email : {{$user->email}}</p>
                                                        <p>Genre: {{$user->genre}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <span style="margin-left: 6px;"></span>
                                        
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $user->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <div class="modal fade" id="confirmDeleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </td>
                                </tr>
                                @endif
                            @endforeach
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