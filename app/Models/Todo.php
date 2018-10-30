<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	protected $table = 'todos';
	protected $fillable = ['title','description','status'];

	public function storeHelper($request)
	{
		$title = $request->title;
		$query = $this->where('title', $title);
		if ($query->count() > 0 ) return false;
		return $this->create($request->all());
	}

	public function updateHelper(int $id, object $request)
	{
		if(!$id) return false;	
		$todo = $this->findOrFail($id);
		$todo->update($request->all());
		return $todo;
	}
}