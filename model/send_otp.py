import os
import sys
import smtplib
from email.message import EmailMessage

# Get the recipient email from command-line arguments
email = sys.argv[1]

# Set up SMTP connection to Gmail's SMTP server
mail = smtplib.SMTP('smtp.gmail.com', 587)
mail.ehlo()
mail.starttls()

# Read sender email and password from credentials file
with open('credentials.txt', 'r') as f:
    sender, password = f.readlines()

# Strip any extra newlines or spaces
sender = sender.strip()
password = password.strip()

# Login to the SMTP server
mail.login(sender, password)

# Email details
recipient = email
subject = 'We Value Your Feedback! 🌟'

# Create email message
msg = EmailMessage()
msg.set_content("""
Hi there,

We hope you're having a great day!

We wanted to take a moment to thank you for using our heart disease prediction website. We sincerely hope our prediction provided valuable insights to you.

We would love to hear your feedback on how accurate or useful you found our prediction. Your suggestions and opinions are incredibly valuable to us as we aim to continuously improve our services.

If there’s anything we could do better or features you’d like to see, please let us know! Your feedback will help us enhance the experience for all our users.

Thank you for choosing our service! If you found it helpful, we would appreciate it if you could recommend our website to others who might benefit from it.

Looking forward to hearing from you!

Best regards,  
The Heart Disease Prediction Team \u00A9
""")
msg['Subject'] = subject
msg['From'] = sender
msg['To'] = recipient

# Send email
mail.send_message(msg)

# Close SMTP connection
mail.quit()
