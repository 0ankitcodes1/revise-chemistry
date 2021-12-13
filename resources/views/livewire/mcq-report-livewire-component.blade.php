<section>
    <h3 class="fw-600">Mcq Reports</h3>
    <div class="row">
        @if (count($pageArray) > 0)
            @foreach ($pageArray as $page)
                <div class="col-12 my-2 col-md-4 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body border border-3 border-style-dashed">
                            <div class="d-flex align-items-center">
                                <p class="m-0 fs-15 me-3">Total Question Asked</p>
                                <span class="btn btn-sm btn-secondary">{{ $page->total_question }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0 fs-15 me-3">Question Attempted</p>
                                <span class="btn btn-sm btn-primary">{{ $page->question_attempted_count }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0 fs-15 me-3">Correct Answer</p>
                                <span class="btn btn-sm btn-success">{{ $page->correct_answer_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 mt-2">
                <div class="card border-0">
                    <div class="card-body border border-style-dashed border-3">
                        <h3 class="m-0 fs-20 text-dark">You have yet to take part in any test</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
