@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <table class="table table-responsive table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lists as $list)
                        @if($list->id == $editItemId)
                            <tr>
                                <td colspan="3">
                                    <form class="form-inline" action="{{ route('editBuy', ['id' => $list->id]) }}" method="post" id="saveItem">
                                        <div class="input-group">
                                            <input required type="text" class="form-control" aria-label="..." placeholder="{{ $list->name }}" name="name" />
                                        </div>
                                        <div class="input-group">
                                            <select required name="category" class="form-control">
                                                <option value="">Choose category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                                {{--<option><a href="#" >Add new category</a></option>--}}
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <input required type="number" class="form-control" placeholder="{{ $list->price }}" name="price" min="1"/>
                                            <div class="input-group-addon">руб.</div>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <button form="saveItem" class="btn btn-success btn-xs" type="submit">Save</button>
                                    <a href="{{ route('lists') }}" class="btn btn-danger btn-xs">Cancel</a>
                                </td>
                            </tr>
                        @else
                        <tr>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->category }}</td>
                            <td>{{ $list->price }}</td>
                            <td>
                                <a href="{{ route('check', ['id' => $list->id]) }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></a>
                                <a href="{{ route('deleteItem', ['id' => $list->id]) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                                <a href="{{ route('editItem', ['id' => $list->id]) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-3">
                    <span>Add new item</span>
                </div>
            </div>

           <div class="row">
               <form action="{{ route('addBuy') }}" method="post" class="form-inline">
                   <div class="form-group">
                       <div class="input-group">
                           <input required type="text" class="form-control" aria-label="..." placeholder="Enter item" name="name" />
                       </div>
                       <div class="input-group">
                           <select required name="category" class="form-control">
                               <option value="">Choose category</option>
                               @foreach($categories as $category)
                                   <option value="{{ $category->name }}">{{ $category->name }}</option>
                               @endforeach
                               {{--<option><a href="#" >Add new category</a></option>--}}
                           </select>
                       </div>
                       <div class="input-group">
                           <input required type="number" class="form-control" placeholder="Price" name="price" min="1"/>
                           <div class="input-group-addon">руб.</div>
                       </div>
                       <button class="btn btn-success" type="submit">Add</button>
                   </div>
               </form>

           </div>

        </div>

    </div>

@stop