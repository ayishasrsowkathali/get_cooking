$(document).ready(function () {
    $('#save-recipe-button').on('click', function () {
        // Check if the user is logged in
        $.ajax({
            url: 'check_login.php', // You need to create this PHP file to check if the user is logged in
            type: 'GET',
            success: function (response) {
                if (response === 'loggedin') {
                    // User is logged in, save the recipe
                    var recipeID = $(this).data('recipeid');

                    // Send an AJAX request to save the recipe
                    $.ajax({
                        url: 'save_recipe.php', // You need to create this PHP file to save the recipe
                        type: 'POST',
                        data: { recipe_id: recipeID },
                        success: function (saveResponse) {
                            if (saveResponse === 'success') {
                                alert('Recipe saved');
                            } else {
                                alert('Failed to save the recipe');
                            }
                        }
                    });
                } else {
                    // User is not logged in, provide a message or redirect to the login page
                    alert('Please login to save this recipe.');
                    window.location.href = 'login.php'; // Replace 'login.php' with your login page URL
                }
            }
        });
    });
});
