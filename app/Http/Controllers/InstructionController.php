<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instruction;

class InstructionController extends Controller
{
  public function show()
  {
    $instructions = Instruction::all();
    return view('instructions.instructions',compact('instructions'));
  }
}
