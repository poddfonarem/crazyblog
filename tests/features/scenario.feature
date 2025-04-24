Feature: User posts and profile

Background:
Given I am a registered user
And I am logged in

Scenario: Creating a new post
Given I am on "/profile"
When I fill in "title" with "My First Post"
And I fill in "content" with "This is a test post."
And I press "Create Post"
Then I should see "Post created successfully"
And I should see "My First Post"

Scenario: Commenting on a post
Given a post titled "Interesting Topic" exists
And I am on the post page
When I fill in "comment" with "Great post!"
And I press "Add Comment"
Then I should see "Comment added"
And I should see "Great post!"

Scenario: Editing profile name
Given I am on "/profile"
When I fill in "name" with "New Username"
And I press "Save Changes"
Then I should see "Profile updated"
And I should see "New Username"
