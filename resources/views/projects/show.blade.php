@extends('layouts.app')
@section('content')
<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
      <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{$project->description}}</p>
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <div class="row container-fluid">
        @include('partials.comments')

      <form method="post" action="{{route('comments.store')}}">
                {{csrf_field()}}   

                <input type="hidden" name="commentable_type" value="PManager\Project">
                <input type="hidden" name="commentable_id" value="{{$project->id}}">

                <div class="form-group">
                  <label for="company-content">Comment</label>
                    <textarea placeholder="Enter Description" style="resize: vertical" id="comment-content" name="body" rows="3" spellcheck="false" class="form-control autosize-target text-left"></textarea>
                </div>


                <div class="form-group">
                  <label for="comment-content">Proof Of Work Done (Url/Photos)</label>
                    <textarea placeholder="Enter url or screenshots" style="resize: vertical" id="comment-content" name="url" rows="2" spellcheck="false" class="form-control autosize-target text-left"></textarea>
                </div>    

                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Submit">

                </div>

              </form>
            </div>   



       </div>


<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <!--  <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{$project->id}}/edit/">Edit</a></li>
              <li><a href="/projects/create/">Add Project</a></li>
              <li><a href="/projects/">List of projects</a></li>

              <br/>
              @if($project->user_id == Auth::user()->id)
              <li><a href="#" onclick= "var result = confirm('Are you sure you wish to delete this project?');
                      if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();}
              ">Delete</a>

              <form id="delete-form" action="{{route('projects.destroy',[$project->id])}}" method="POST" style="display: none;">
                  <input type="hidden" name="_method" value="delete">
                  {{csrf_field()}}
                </form>
            </li> 
            @endif        
           </ol>
          </div>

          <!--<div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">

              <li><a href="#">March 2014</a></li>
            </ol>
          </div> -->
</div>

@endsection