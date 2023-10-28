@for ($i = 0; $i < $numQuestions; $i++) <div class="mb-3 row">
    <label for="question_text_{{ $i }}" class="col-md-2 col-form-label">Question Text</label>
    <div class="col-md-10">
        <input class="form-control" type="text" id="question_text_{{ $i }}" name="questions[{{ $i }}][text]" required>
    </div>
    </div>
    <div class="mb-3 row">
        <label for="optionA_{{ $i }}" class="col-md-2 col-form-label">Option A</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="optionA_{{ $i }}" name="questions[{{ $i }}][options][A]" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="optionB_{{ $i }}" class="col-md-2 col-form-label">Option B</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="optionB_{{ $i }}" name="questions[{{ $i }}][options][B]" required>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="optionC_{{ $i }}" class="col-md-2 col-form-label">Option C</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="optionC_{{ $i }}" name="questions[{{ $i }}][options][C]" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="optionD_{{ $i }}" class="col-md-2 col-form-label">Option D</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="optionD_{{ $i }}" name="questions[{{ $i }}][options][D]" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="correct_option_{{ $i }}" class="col-md-2 col-form-label">Correct Option</label>
        <div class="col-md-10">
            <select class="form-control" name="questions[{{ $i }}][correct_option]">
                <option value="1">Option A</option>
                <option value="2">Option B</option>
                <option value="3">Option C</option>
                <option value="4">Option D</option>
                <!-- Add options for C and D if needed -->
            </select>
        </div>
    </div>
    @endfor
    <div class="mb-3 row">
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </div>