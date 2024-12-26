@extends('layouts.master')
@section('title', 'Create Transaction')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-4">Create New Transaction</h2>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
            <input type="text" name="user_id" id="user_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" value="{{ old('user_id') }}">
        </div>

        <div class="mb-4">
            <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
            <select name="payment_method" id="payment_method" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="transfer" {{ old('payment_method') == 'transfer' ? 'selected' : '' }}>Transfer</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Items</label>
            <div id="items-container">
                @foreach ($foods as $food)
                    <div class="flex items-center space-x-4 mb-2">
                        <label>
                            <input type="checkbox" name="items[{{ $food->id }}][food_id]" value="{{ $food->id }}">
                            {{ $food->name }}
                        </label>
                        <input type="number" name="items[{{ $food->id }}][quantity]" placeholder="Quantity" class="border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
    </form>
</div>
@endsection
