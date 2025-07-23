?>
@extends('layouts.admin')

@section('title', 'Questionnaire - Administration')

@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Gestion du Questionnaire</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">#</th>
                    <th class="w-9/12 text-left py-3 px-4 uppercase font-semibold text-sm">Corps de la question</th>
                    <th class="w-2/12 text-center py-3 px-4 uppercase font-semibold text-sm">Type</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach ($questions as $question)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="text-left py-3 px-4">{{ $question->order }}</td>
                        <td class="text-left py-3 px-4">{{ $question->body }}</td>
                        <td class="text-center py-3 px-4">
                            <span class="bg-blue-200 text-blue-800 py-1 px-3 rounded-full text-xs">{{ $question->type }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 text-sm text-gray-600">
            <p><strong>Note :</strong> Les questions ne sont pas administrables depuis cette interface.</p>
        </div>
    </div>
@endsection

