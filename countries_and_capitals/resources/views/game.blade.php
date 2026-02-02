<x-main-layout pageTitle="Quiz Countries and Capitals">
    <div class="container">

        <x-question :currentQuestion="$currentQuestion" :totalQuestions="$totalQuestions" :country="$country" />

        <div class="row">
            @foreach ($answers as $answer)
                <x-answer :capital="$answer" />
            @endforeach
        </div>
        
    </div>

    <!-- cancel game -->
    <div class="text-center mt-5">
        <a href="#" class="btn btn-outline-danger mt-3 px-5">CANCELAR JOGO</a>
    </div>

</x-main-layout>