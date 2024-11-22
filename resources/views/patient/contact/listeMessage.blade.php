@extends('layouts.admin')
@section('title')
Envoyer Message
@endsection
<style>
    /* Styles pour les messages de l'expéditeur */
.message.expediteur {
    background-color: #cee7f3;
    padding: 5px;
    border-radius: 5px;
    text-align: right;
}

/* Styles pour les messages du destinataire */
.message.destinataire {
    background-color: #e4baba;
    padding: 5px;
    border-radius: 5px;
    text-align: left;
}

/* Styles pour le formulaire de message */
.message-list {
    max-height: 300px; /* Limitez la hauteur pour faire défiler les messages */
    overflow-y: auto;
}

</style>
@section('content')
<main id="main" class="main">
    <section class="section" style="left: 19% ;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pagetitle" >
                            <h1>Discussion entre {{ $expediteur->nom }} et {{ $destinataire->nom }}</h1>
                        </div><br>
                        <div class="card-body">
                            @foreach ($messages as $message)
                                <div class="message {{ $message->expediteur == $expediteur->id ? 'expediteur' : 'destinataire' }}">
                                    {{ $message->message }}
                                </div>
                                <br>
                            @endforeach
                            
                            <form action="{{ route('envoyer.message') }}" method="POST">
                                @csrf
                                <input type="hidden" name="destinataire" value="{{ $destinataire->id }}">
                                <input type="hidden" name="Subject" value="réponse">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Écrivez votre message ici" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection