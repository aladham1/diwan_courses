<?php

namespace App\Policies;

use App\Models\ExpenseCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ExpenseCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAbility('expenses_categories.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param ExpenseCategory $expenseCategory
     * @return bool
     */
    public function view(User $user, ExpenseCategory $expenseCategory): bool
    {
        return $user->hasAbility('expenses_categories.view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return $user->hasAbility('expenses_categories.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ExpenseCategory $expenseCategory
     * @return Response|bool
     */
    public function update(User $user, ExpenseCategory $expenseCategory)
    {
        return $user->hasAbility('expenses_categories.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ExpenseCategory $expenseCategory
     * @return Response|bool
     */
    public function delete(User $user, ExpenseCategory $expenseCategory)
    {
        return $user->hasAbility('expenses_categories.delete');
    }
}
