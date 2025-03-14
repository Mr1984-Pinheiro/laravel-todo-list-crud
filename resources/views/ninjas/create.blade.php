<x-layout>
    <form action="" method="">
        @csrf
        
        <h2>Create a New Ninja</h2>

        <!-- ninja Name -->
        <label for="name">Ninja Name:</label>
        <input
            class="!border-2 !border-gray-400" 
            type="text" 
            id="name" 
            name="name" 
            value="{{ old('name') }}" 
            required
        >

        <!-- ninja Strength -->
        <label for="skill">Ninja Skill (0-100):</label>
        <input
            class="!border-2 !border-gray-400" 
            type="number" 
            id="skill" 
            name="skill" 
            required
        >

        <!-- ninja Bio -->
        <label for="bio">Biography:</label>
        <textarea
            class="!border-2 !border-gray-400"
            rows="5"
            id="bio" 
            name="bio" 
            required
        ></textarea>

        <!-- select a dojo -->
        <label for="dojo_id">Dojo:</label>
        <select id="dojo_id" name="dojo_id" required class="!border-2 !border-gray-400">
            <option value="" disabled selected>Select a dojo</option>
            @foreach ( $dojos as $dojo )
                <option value="{{ $dojo->id }}">
                    {{ $dojo->name }}
                </option>
            @endforeach            
        </select>

        <button type="submit" class="btn mt-4">Create Ninja</button>

        <!-- validation errors -->
        
    </form>
</x-layout>
