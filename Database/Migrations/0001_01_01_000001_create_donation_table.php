<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation', function (Blueprint $table) {
            $table->id();
            $table->integer('donation_id')->nullable();
            $table->enum('donation_type', ['Money', 'food', 'cloth', 'Books', 'Equipment', 'Other'])->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation');
    }
};



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donation';

    protected $fillable = [
        'donation_id',
        'donation_type',
        'description',
        'image',
    ];
}



/* app/Http/Controllers/DonationController.php */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::orderBy('created_at', 'desc')->get();

        return view('donation', compact('donations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'donation_id'   => 'nullable|integer',
            'donation_type' => 'required|in:Money,food,cloth,Books,Equipment,Other',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        Donation::create($data);

        return redirect()->route('donation.index')->with('success', 'Donation saved successfully');
    }
}
