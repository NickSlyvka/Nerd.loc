<!-- app/views/nerds/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL('nerds') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL('nerds') }}">View All Nerds</a></li>
            <li><a href="{{ URL('nerds/create') }}">Create a Nerd</a>
        </ul>
    </nav>

    <h1>Create a Nerd</h1>

    <!-- if there are creation errors, they will show here -->
    <form class="form-horizontal" method="post" action="{{ URL('nerds') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('nerd_level') ? ' has-error' : '' }}">
            <label for="nerd_level" class="col-md-4 control-label">Nerd_level</label>

            <div class="col-md-6">
                <select name="nerd_level" id="nerd_level" class="form-control">
                    <option>Select a Level</option>
                    <option value="1">Sees Sunlight</option>
                    <option value="2">Foosball Fanatic</option>
                    <option value="3">Basement Dweller</option>
                </select>
                @if ($errors->has('nerd_level'))
                    <span class="help-block">
                    <strong>{{ $errors->first('nerd_level') }}</strong>
                    </span>
                @endif
                <br>
                <input type="submit" class="btn btn-primary" value="Create The Nerd">
            </div>
        </div>
    </form>

</div>
</body>
</html>