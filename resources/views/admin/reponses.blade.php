@extends('layouts.admin')

@section('title', 'Réponses - Administration')

@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Réponses au Sondage</h1>

    @if($submissions->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-700">Aucune réponse au sondage pour le moment.</p>
        </div>
    @else
        <div class="space-y-8">
            @foreach ($submissions as $submission)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between items-center mb-4 border-b pb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Réponses de : <span class="text-blue-600">{{ $submission->email }}</span></h2>
                        <span class="text-sm text-gray-500">Soumis le : {{ $submission->created_at->format('d/m/Y à H:i') }}</span>
                    </div>

                    <table class="min-w-full bg-white">
                        <tbody class="text-gray-700">
                        @foreach ($submission->answers->sortBy('question.order') as $answer)
                            <tr class="border-b border-gray-200">
                                <td class="w-1/12 py-3 px-4 font-semibold">{{ $answer->question->order }}</td>
                                <td class="w-5/12 py-3 px-4">{{ $answer->question->body }}</td>
                                <td class="w-6/12 py-3 px-4 text-gray-800 bg-gray-100 rounded-md">{{ $answer->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    @endif
@endsection

