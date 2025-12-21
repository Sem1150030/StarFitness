}
    }
        return view('livewire.components.meals.add-meal-modal');
    {
    public function render()

    }
        $this->reset(['mealName', 'calories', 'protein', 'carbs', 'fat']);
        $this->closeModal();

        // ...
        // Save meal logic here

        $this->validate();
    {
    public function saveMeal()

    ];
        'fat' => 'required|numeric|min:0',
        'carbs' => 'required|numeric|min:0',
        'protein' => 'required|numeric|min:0',
        'calories' => 'required|numeric|min:0',
        'mealName' => 'required|string|max:255',
    protected $rules = [

    public $fat = '';
    public $carbs = '';
    public $protein = '';
    public $calories = '';
    public $mealName = '';
{
class AddMealModal extends ModalBase

use App\Livewire\Components\ModalBase;

namespace App\Livewire\Components\Meals;


