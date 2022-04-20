@extends('layouts.main')
@section('content')
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-r-0 title-margin-right">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Answers</h1>
                    </div>
                </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-6 title">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('/answers') }}">Answer</a> </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section id="main-content">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <button type="button" id="addNewAnswer" class="btn btn-success"><i
                                    class="fa fa-plus"></i> Add</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th width="10%">S.N</th>
                                            <th width="30%">Title</th>
                                            <th width="30%">Question</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($questions as $question)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $question->title }}</td>
                                                <td>{{ $question->question }}</td>
                                                <td></td>
                                            </tr>
                                        @empty
                                            <p>No Records Found!!</p>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $questions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="modal fade" id="ExampleModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="QuestionModel"></h6>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="addQuestionForm" name="addQuestionForm"
                            class="form-horizontal" method="POST">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Question Title" value="" maxlength="50" required="">
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Question</label>
                                    <input type="text" class="form-control" id="question" name="question"
                                        placeholder="Enter Question" value="" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewQuestion">Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#addNewQuestion').click(function() {
                $('#addQuestionForm').trigger("reset");
                $('#QuestionModel').html("Add Question");
                $('#ExampleModal').modal('show');
            });

            $('body').on('click', '#btn-save', function(event) {

                var id = $("#id").val();
                var title = $("#title").val();
                var question = $("#question").val();
                console.log(question);

                $("#btn-save").html('Please Wait...');
                $("#btn-save").attr("disabled", true);

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('add-question') }}",
                    data: {
                        id: id,
                        title: title,
                        question: question,
                    },
                    dataType: 'json',
                    success: function(res) {
                        window.location.reload();
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                    }
                });

            });

        });
    </script>
@endsection