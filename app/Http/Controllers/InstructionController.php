<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instruction;

class InstructionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function show()
  {
    $instructions = Instruction::all();
    return view('instructions.instructions',compact('instructions'));
  }
  public function delete(Instruction $instruction)
  {
    $instruction->delete();
    return redirect()->back();
  }
  public function new()
  {
    $instruction = New Instruction();
    return view('instructions.newInstruction',compact('instruction'));
  }
  public function save(Request $request)
  {
    $instruction = New Instruction();
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
      ],
      [
      ],
      [
          'name' => 'nombre',
      ]
  );
  $instruction = new Instruction;
  $instruction->fill($request->all());
  $instruction->save();
  return redirect()->route('show-instructions');
  }
  public function edit(Instruction $instruction)
  {
    return view('instructions.editInstruction',compact('instruction'));
  }
  public function update(Instruction $instruction, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
      ],
      [
      ],
      [
          'name' => 'nombre',
      ]
  );
  $instruction->fill($request->all());
  $instruction->save();
  return redirect()->route('show-instructions');
  }
}
