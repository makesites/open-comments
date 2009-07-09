	<div id="comment-form">
		<h3>Leave a Comment</h2>
		<form action="<?=$action?>" method="post">
			<label for="author"Name (required)</label>
			<input name="author" id="author" value="" size="35" type="text">

			<label for="email">OpenID (required)</label>
			<input name="email" id="email" value="" size="35" type="text">
			
			<label for="comment" class="label">Comment:</label>
			<textarea name="comment" id="comment" rows="7" cols="45"></textarea>

			<div class="buttons">
				<input type="submit" name="submit" id="comment-submit-button" class="button" value="Submit" />
				<input type="button" name="comment-preview-button" id="comment-preview-button" class="button" value="Preview" />
			</div>
				
		</form>
			
	</div>
