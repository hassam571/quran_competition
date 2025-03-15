@extends('layouts.app')

@section('content')


<header class="header">
    <a class="back-btn" href="{{ route('welcome') }}"><i class="fas fa-home"></i></a>
    <h1>Edit Questions</h1>
  </header>

  <div class="container1">
<div class="tabs">

<button class="tab-btn "  onclick="window.location.href='{{ route('questions.create') }}'">Create Question</button>
<button class="tab-btn " onclick="window.location.href='{{ route('questions.list') }}'">Question List</button>
</div>
  </div>


<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger alert-custom animate__animated animate__fadeInDown" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('questions.update', $question->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT')

        <!-- Competition -->
        <div class="form-group">
            <label for="competition_id">Competition</label>
            <select class="form-control" id="competition_id" name="competition_id" required>
                <option value="">Select Competition</option>
                @foreach($competitions as $competition)
                    <option value="{{ $competition->id }}" {{ old('competition_id', $question->competition_id) == $competition->id ? 'selected' : '' }}>
                        {{ $competition->main_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Question Name -->
        <div class="form-group">
            <label for="question_name">Question Name</label>
            <input type="text" class="form-control" id="question_name" name="question_name"
                   value="{{ old('question_name', $question->question_name) }}"
                   placeholder="Enter Question Name" required />
        </div>

        <!-- Age Category -->
        <div class="form-group">
            <label for="age_category_id">Age Category</label>
            <select class="form-control" id="age_category_id" name="age_category_id" required>
                <option value="">Select Age Category</option>
                @foreach($ageCategories as $ageCategory)
                    <option value="{{ $ageCategory->id }}" {{ old('age_category_id', $question->age_category_id) == $ageCategory->id ? 'selected' : '' }}>
                        {{ $ageCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Side Category -->
        <div class="form-group">
            <label for="side_category_id">Side Category</label>
            <select class="form-control" id="side_category_id" name="side_category_id" required>
                <option value="">Select Side Category</option>
                @foreach($sideCategories as $sideCategory)
                    <option value="{{ $sideCategory->id }}" {{ old('side_category_id', $question->side_category_id) == $sideCategory->id ? 'selected' : '' }}>
                        {{ $sideCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Read Category -->
        <div class="form-group">
            <label for="read_category_id">Read Category</label>
            <select class="form-control" id="read_category_id" name="read_category_id" required>
                <option value="">Select Read Category</option>
                @foreach($readCategories as $readCategory)
                    <option value="{{ $readCategory->id }}" {{ old('read_category_id', $question->read_category_id) == $readCategory->id ? 'selected' : '' }}>
                        {{ $readCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Book Number -->
        <div class="form-group">
            <label for="book_number">Book Number</label>
            <select class="form-control" id="book_number" name="book_number" required>
                <option value="">Select Book Number</option>
                @foreach(range(1, 30) as $juzNumber)
                    <option value="{{ $juzNumber }}" {{ old('book_number', $question->book_number) == $juzNumber ? 'selected' : '' }}>
                        Juz {{ $juzNumber }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Surah -->
        {{-- <div class="form-group">
            <label for="surah">Surah</label>
            <select class="form-control" id="surah" name="surah" required>
                <option value="">Select Surah</option>
            </select>
        </div> --}}

        <!-- From Ayat Number -->
        <div class="form-group">
            <label for="from_ayat_number">From Ayat Number</label>
            <input type="number" class="form-control" id="from_ayat_number" name="from_ayat_number"
                   value="{{ old('from_ayat_number', $question->from_ayat_number) }}"
                   placeholder="Enter From Ayat Number" required />
        </div>

        <!-- To Ayat Number -->
        <div class="form-group">
            <label for="to_ayat_number">To Ayat Number</label>
            <input type="number" class="form-control" id="to_ayat_number" name="to_ayat_number"
                   value="{{ old('to_ayat_number', $question->to_ayat_number) }}"
                   placeholder="Enter To Ayat Number" required />
        </div>

        <!-- Hardness -->
        <div class="form-group">
            <label for="hardness">Hardness of this Question (%)</label>
            <input type="number" class="form-control" id="hardness" name="hardness"
                   value="{{ old('hardness', $question->hardness) }}"
                   placeholder="Hardness of this Question %" min="0" max="100" required />
        </div>

        <button type="submit" class="btn btn-save">Update</button>
    </form>



</div>

<script>document.addEventListener("DOMContentLoaded", function () {
    const bookDropdown = document.getElementById("book_number");
    const surahDropdown = document.getElementById("surah");

    const selectedJuz = "{{ old('book_number', $question->book_number) }}";
    const selectedSurah = "{{ old('surah', $question->surah) }}";

    function populateSurahs(juzNo) {
        fetch(`/get-surahs?juz_no=${juzNo}`)
            .then(response => response.json())
            .then(surahs => {
                surahDropdown.innerHTML = '<option value="">Select Surah</option>';
                surahs.forEach(surah => {
                    const option = document.createElement("option");
                    option.value = surah.surah_no;
                    option.textContent = `${surah.surah_no} - ${surah.surah_name_ar} (${surah.surah_name_roman})`;
                    if (surah.surah_no == selectedSurah) {
                        option.selected = true;
                    }
                    surahDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching Surahs:', error));
    }

    // Restore selected Juz and populate Surahs on page load
    if (selectedJuz) {
        bookDropdown.value = selectedJuz;
        populateSurahs(selectedJuz);
    }

    // Update Surahs dynamically on Juz selection
    bookDropdown.addEventListener("change", function () {
        const juzNo = this.value;
        surahDropdown.innerHTML = '<option value="">Select Surah</option>';
        if (juzNo) {
            populateSurahs(juzNo);
        }
    });
});

</script>
@endsection
