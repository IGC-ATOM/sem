Imports System.Data.OleDb
Imports System.Web.Services.Description

Public Class Login
    Inherits System.Web.UI.Page

    Dim con As New OleDbConnection("Provider=Microsoft.ACE.OLEDB.12.0;Data Source=C:\Users\Lenovo\OneDrive\Documents\Data.accdb")
    Dim cmd As New OleDbCommand
    Dim ad As New OleDbDataAdapter
    Dim ds As New DataSet


    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load

    End Sub

    Protected Sub Login1_Authenticate(sender As Object, e As AuthenticateEventArgs) Handles Login1.Authenticate
        con.Open()
        cmd.CommandText = "SELECT * FROM Admin_Login WHERE email='" & Login1.UserName & "' and password='" & Login1.Password & "'"
        cmd.Connection = con
        ad.SelectCommand = cmd
        cmd.ExecuteNonQuery()
        ad.Fill(ds, "Admin_Login")
        If ds.Tables("Admin_Login").Rows.Count > 0 Then
            con.Close()
            Response.Redirect("HomePage2.aspx")

        Else
            MsgBox("Email Or Passsword is inncorect!")
            con.Close()
        End If
    End Sub
End Class